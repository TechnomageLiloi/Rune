<?php

namespace Liloi\Rune\Modules\Databank\Domain\Scrolls;

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
        return self::getTablePrefix() . 'scrolls';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_scroll desc;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_scroll="%s"',
            $name,
            $key
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        $key = $data['key_scroll'];
        unset($data['key_scroll']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_scroll = "%s"', $key)
        );
    }

    public static function create(string $keyAtom): Entity
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, [
            'key_atom' => $keyAtom,
            'title' => 'Enter the title',
            'scroll' => 'Enter the scroll',
        ]);

        return self::load(\mysqli_insert_id(self::getAdapter()->getConnection()->get()));
    }
}