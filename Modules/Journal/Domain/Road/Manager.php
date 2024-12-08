<?php

namespace Liloi\Rune\Modules\Journal\Domain\Road;

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
        return self::getTablePrefix() . 'road';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_day desc limit 7;',
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
            'select * from %s where key_day="%s"',
            $name,
            $key
        ));

        if(empty($row))
        {
            return self::create($key);
        }

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_day'];
        unset($data['key_day']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_day = "%s"', $key)
        );
    }

    public static function create(string $key): Entity
    {
        $name = self::getTableName();
        $data = [
            'key_day' => $key,
            'goal' => 'Enter the goal',
            'program' => 'Enter the journal day record',
        ];
        self::getAdapter()->insert($name, $data);

        return Entity::create($data);
    }
}