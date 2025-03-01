<?php

namespace Liloi\Rune\Domain\Maps;

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
        return self::getTablePrefix() . 'maps';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_map between "%s 00:00:00" and "%s 23:59:59" order by key_map desc;',
            $name, date('Y-m-d'), date('Y-m-d')
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    /**
     * Load problem from database.
     *
     * @param string $keyRoad
     * @return Entity
     */
    public static function load(string $keyRoad): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_map="%s"',
            $name,
            $keyRoad
        ));

        if(empty($row))
        {
            return self::create($keyRoad);
        }

        return Entity::create($row);
    }

    /**
     * Save problem to database.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        $RID = $data['key_map'];

        self::update(
            $name,
            $data,
            sprintf('key_map = "%s"', $RID)
        );
    }

    /**
     * Create problem in database.
     */
    public static function create(string $key): Entity
    {
        $name = self::getTableName();
        $data = [
            'key_map' => $key,
            'title' => 'Enter note',
            'map' => '-',
            'data' => '{}',
            'dt' => date('Y-m-d H:i:s')
        ];

        self::insert($name, $data);
        return Entity::create($data);
    }

    public static function URLtoATOM(string $URL): string
    {
        $key = str_replace('/', ':', trim($URL, '/'));
        $key = str_replace('rune:','', $key);
        return $key ? 'rune:' . $key : 'rune';
    }

    public static function ATOMtoURL(string $keyAtom): string
    {
        if($keyAtom === 'rune')
        {
            return '/';
        }

        return '/' . str_replace(':', '/', $keyAtom);
    }

    public static function loadFiles(string $keyMap): Collection
    {
        $name = self::getTableName();

        $sql = sprintf(
            'select * from %s where (key_map like "%s:%%") && (key_map not like "%s:%%:%%") order by title asc;',
            $name, $keyMap, $keyMap
        );

        $rows = self::getAdapter()->getArray($sql);

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }
}