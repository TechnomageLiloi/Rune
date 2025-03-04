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

    public static function loadCollection(string $key_quest, string $key_map): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_quest="%s" and key_map="%s" order by key_crystal desc limit 17;',
            $name, $key_quest, $key_map
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

        $keyCrystal = $data['key_crystal'];

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_crystal="%s"', $keyCrystal)
        );
    }

    public static function create(
        string $key_quest,
        string $key_map,
        array $data = []
    ): Entity
    {
        $name = self::getTableName();
        $row = [
            'key_crystal' => date('Y-m-d H:i:s'),
            'key_quest' => $key_quest,
            'key_map' => $key_map,
            'data' => json_encode($data, JSON_UNESCAPED_UNICODE)
        ];

        self::getAdapter()->insert($name, $row);

        return Entity::create($data);
    }
}