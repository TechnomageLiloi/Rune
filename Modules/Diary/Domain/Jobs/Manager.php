<?php

namespace Liloi\Rune\Modules\Diary\Domain\Jobs;

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
        return self::getTablePrefix() . 'diary_jobs';
    }

    public static function loadCollection(string $keyStep): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_step="%s" order by key_job desc;',
            $name, $keyStep
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
     * @param string $keyJob
     * @param string $keyStep
     * @return Entity
     */
    public static function load(string $keyStep, string $keyJob): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_step="%s" and key_job="%s";',
            $name, $keyStep, $keyJob
        ));

        if(!$row)
        {
            // @todo: throw exception
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

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s order by key_job desc limit 1;',
            $name
        ));

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
//        unset($data['key_job']);

        self::update($name, $data, sprintf('key_job="%s"', $entity->getKey()));
    }

    /**
     * Create new day.
     * @param string $key_step
     * @return Entity
     */
    public static function create(string $key_step): Entity
    {
        $data = [
            'key_job' => date('H:i:s'),
            'key_step' => $key_step,
            'title' => '-',
            'type' => Types::CODEX
        ];

        self::getAdapter()->insert(self::getTableName(), $data);

        return Entity::create($data);
    }
}