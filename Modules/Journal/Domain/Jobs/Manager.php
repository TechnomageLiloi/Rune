<?php

namespace Liloi\Rune\Modules\Journal\Domain\Jobs;

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
        return self::getTablePrefix() . 'levels';
    }

    public static function loadCollection(string $keyDay): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_day = "%s";',
            $name, $keyDay
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadGroup(string $keyDay): array
    {
        $group = [];

        for ($hour=0;$hour<24;$hour++)
        {
            $group[$hour] = [];

            for ($quarter=1;$quarter<=4;$quarter++)
            {
                $group[$hour][$quarter] = null;
            }
        }

        $jobs = self::loadCollection($keyDay);

        /** @var Entity $job */
        foreach ($jobs as $job)
        {
            $group[$job->getHour()][$job->getQuarter()] = $job;
        }

        return $group;
    }

    public static function load(string $key): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_level="%s"',
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
        $key = $data['key_level'];
        unset($data['key_level']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_level = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, [
            'title' => 'Enter the title',
            'status' => Statuses::TODO,
            'program' => '// comment',
            'resource' => 'Wool: ' . date('Y-m-d-H-i-s'),
        ]);
    }

    public static function getList(): array
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select key_level, title from %s where status!="%s" order by key_level asc;',
            $name, Statuses::TODO
        ));

        $listDefended = [];

        foreach($rows as $row)
        {
            $listDefended[$row['key_level']] = $row['title'];
        }

        return $listDefended;
    }

    public static function getListResource(): array
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select key_level, title, resource from %s where status!="%s" order by key_level asc;',
            $name, Statuses::TODO
        ));

        $listDefended = [];

        foreach($rows as $row)
        {
            $listDefended[$row['key_level']] = $row['resource'] . ' (' . $row['title'] . ')';
        }

        return $listDefended;
    }
}