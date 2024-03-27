<?php

namespace Liloi\Rune\Domain\Atoms;

use Liloi\Rune\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'atoms';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_atom desc;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadPublished(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where status in ("%s", "%s") order by ts desc;',
            $name, Statuses::PUBLISHED, Statuses::DEPRECATED
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key_topic): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_atom="%s";',
            $name, $key_topic
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_atom']);

        self::update($name, $data, sprintf('key_atom="%s"', $entity->getKey()));
    }

    public static function create(string $key_atom): void
    {
        self::getAdapter()->insert(self::getTableName(), [
            'key_atom' => $key_atom,
            'title' => 'Enter the title',
            'summary' => 'Enter the summary',
            'status' => Statuses::TODO,
            'tags' => 'Enter the tags',
            'ts' => date('Y-m-d H:i:s')
        ]);
    }
}