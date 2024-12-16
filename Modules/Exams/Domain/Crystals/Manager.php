<?php

namespace Liloi\Rune\Modules\Exams\Domain\Crystals;

use Liloi\Rune\Domain\Manager as DomainManager;
use Liloi\Rune\Services\Cache;

/**
 * Question's manager.
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

    public static function loadCollection(string $key_item): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_item="%s" order by title desc limit 100;',
            $name, $key_item
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadByTags(string $tags, string $RID): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where tags like "%%%s%%" and rid like "%s%%" limit 100;',
            $name, $tags, $RID
        ));

        shuffle($rows);

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

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_crystal="%s"',
            $name,
            $key_crystal
        ));

        return Entity::create($row);
    }

    public static function setDoneParameter(string $key_crystal, bool $done): void
    {
        $query = sprintf(
            'update %s set %s where %s',
            self::getTableName(),
            "done=b'" . (int)$done . "'",
            "key_crystal='" . $key_crystal . "'"
        );

        self::getAdapter()->getConnection()->request($query);

    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_crystal'];
//        unset($data['key_crystal']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_crystal = "%s"', $key)
        );
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_crystal = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $key_item): array
    {
        Cache::remove('questions:collection:' . $key_item);
        Cache::remove('questions:load-by-tags:' . $key_item);

        $name = self::getTableName();
        $data = [
            'key_crystal' => date('Y-m-d H:i:s'),
            'key_item' => $key_item,
            'title' => 'Enter the title',
            'status' => Statuses::TODO,
            'type' => Types::CARD,
            'program' => '{}',
            'theory' => '// theory',
            'tags' => 'tags',
            'dt' => date('Y-m-d H:i:s')
        ];
        self::getAdapter()->insert($name, $data);

        return $data;
    }
}