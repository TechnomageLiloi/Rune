<?php

namespace Liloi\Rune\Domain\Tickets;

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
        return self::getTablePrefix() . 'tickets';
    }

    public static function loadCollection(string $keyProject): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_project=%s order by dt desc;',
            $name, $keyProject
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
            'select * from %s where key_ticket="%s"',
            $name,
            $key
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_ticket'];
        unset($data['key_ticket']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_ticket = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $key_project): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, [
            'key_project' => $key_project,
            'title' => 'Enter the title',
            'dt' => date('Y-m-d H:i:s'),
            'data' => '{}'
        ]);
    }
}