<?php

namespace Liloi\Rune\Domain\Diary;

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
        return self::getTablePrefix() . 'diary';
    }

    /**
     * Load day by key.
     *
     * @param string $keyDay
     * @return Entity
     */
    public static function load(string $keyDay): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_day="%s";',
            $name, $keyDay
        ));

        if(!$row)
        {
            $row = self::create($keyDay);
        }

        return Entity::create($row);
    }

    /**
     * Load current day.
     *
     * @return Entity
     */
    public static function loadCurrent(): Entity
    {
        $name = self::getTableName();
        $keyDay = date('Y-m-d');

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_day="%s" limit 1;',
            $name, $keyDay
        ));

        if(!$row)
        {
            $row = self::create($keyDay);
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
        unset($data['key_day']);

        self::update($name, $data, sprintf('key_day="%s"', $entity->getKey()));
    }

    /**
     * Create new day.
     *
     * @param string $keyDay
     * @return array
     */
    public static function create(string $keyDay): array
    {
        $data = [
            'key_day' => $keyDay,
            'title' => 'Date key: ' . $keyDay,
            'program' => '-',
            'data' => '{}',
            'status' => Statuses::TODO,
            'type' => Types::BIOTECH,
            'start' => $keyDay . '00:00:00',
            'finish' => $keyDay . '23:59:59'
        ];

        self::getAdapter()->insert(self::getTableName(), $data);

        return $data;
    }
}