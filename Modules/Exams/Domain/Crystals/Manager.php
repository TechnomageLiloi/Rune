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
}