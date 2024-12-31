<?php

namespace Liloi\Rune\Modules\Exams\Domain\Crystals;

use Liloi\Rune\Domain\Manager as DomainManager;
use Liloi\Judex\Assert;

/**
 * Crystal's manager.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'crystals';
    }

    public static function loadCollection(string $key_opponent, string $RID): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_opponent="%s" and rid="%s" order by key_crystal desc limit 17;',
            $name, $key_opponent, $RID
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadPeriod(string $from, string $to): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_crystal between "%s" and "%s";',
            $name, $from, $to
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key_crystal): Entity
    {
        $name = self::getTableName();
        Assert::notEmpty($key_crystal);

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_crystal="%s"',
            $name, $key_crystal
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        $keyOpponent = $data['key_crystal'];

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_crystal="%s"', $keyOpponent)
        );
    }

    public static function create(
        string $key_opponent,
        string $RID,
        $status = Statuses::LOSE,
        array $data = []
    ): Entity
    {
        $name = self::getTableName();
        $row = [
            'key_crystal' => date('Y-m-d H:i:s'),
            'key_opponent' => $key_opponent,
            'rid' => $RID,
            'status' => $status,
            'data' => json_encode($data)
        ];

        self::getAdapter()->insert($name, $row);

        return Entity::create($data);
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

        $crystals = self::loadPeriod($keyDay . ' 00:00:00', $keyDay . ' 23:59:59');

        /** @var Entity $crystal */
        foreach ($crystals as $crystal)
        {
            if(!isset($group[$crystal->getHour()][$crystal->getQuarter()]))
            {
                $group[$crystal->getHour()][$crystal->getQuarter()] = [];
            }

            $group[$crystal->getHour()][$crystal->getQuarter()][] = $crystal;
        }

        return $group;
    }
}