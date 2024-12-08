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
        return self::getTablePrefix() . 'jobs';
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

    public static function load(string $keyHour, string $keyQuarter): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_hour="%s" and key_quarter="%s"',
            $name, $keyHour, $keyQuarter
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_hour="%s" and key_quarter="%s"', $data['key_hour'], $data['key_quarter'])
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(
        string $keyHour,
        string $keyQuarter,
        string $keyDay
    ): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, [
            'key_hour' => $keyHour,
            'key_quarter' => $keyQuarter,
            'key_day' => $keyDay,
            'goal' => 'Enter the goal',
            'status' => Statuses::TODO
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