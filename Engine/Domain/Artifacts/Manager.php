<?php

namespace Liloi\Rune\Domain\Artifacts;

use Liloi\Rune\Domain\Manager as DomainManager;
use Liloi\Rune\Domain\Lessons\Positions as LessonsPositions;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'artifacts';
    }

    public static function loadCollection(string $RID = 'rune'): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_atom="%s" order by key_artifact asc limit 100;',
            $name, $RID
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    /**
     * Load day by key.
     *
     * @param string $keyArtifact
     * @return Entity
     */
    public static function load(string $keyArtifact): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_artifact="%s";',
            $name, $keyArtifact
        ));

        if(!$row)
        {
            // @todo: throw exception
        }

        return Entity::create($row);
    }

    /**
     * Save day.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
//        unset($data['key_artifact']);

        self::update($name, $data, sprintf('key_artifact="%s"', $entity->getKey()));
    }

    /**
     * Create new day.
     */
    public static function create(string $RID): Entity
    {
        $data = [
            'key_artifact' => date('Y-m-d H:i:s'),
            'key_atom' => $RID,
            'type' => Types::SIMPLE_FILE,
            'title' => '-',
            'description' => '-',
            'global' => '-',
            'local' => '-',
            'data' => '{}'
        ];

        self::getAdapter()->insert(self::getTableName(), $data);

        return Entity::create($data);
    }

    public static function dump(string $fil): void
    {
        $data = [];
        $name = self::getTableName();
        $rows = self::getAdapter()->getArray(sprintf('select * from %s;', $name));

        foreach ($rows as $row)
        {
            $data[] = [
                "title" => $row['title'],
                "description" => $row['description'],
                "type" => "file",
                "global" => $row['global'],
                "local" => $row['local']
            ];
        }

        file_put_contents($fil, json_encode($data, JSON_UNESCAPED_UNICODE));
    }
}