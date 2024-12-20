<?php

namespace Liloi\Rune\Modules\Exams\Domain\Crystals;

use Liloi\Rune\Domain\Manager as DomainManager;

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

    public static function loadCollection(string $key_item, string $RID): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_item="%s" and rid = "%s" order by title desc limit 100;',
            $name, $key_item, $RID
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key_crystal, string $RID): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_crystal="%s" and rid = "%s"',
            $name, $key_crystal, $RID
        ));

        return Entity::create($row);
    }

//    public static function setDoneParameter(string $key_crystal, bool $done): void
//    {
//        $query = sprintf(
//            'update %s set %s where %s',
//            self::getTableName(),
//            "done=b'" . (int)$done . "'",
//            "key_crystal='" . $key_crystal . "'"
//        );
//
//        self::getAdapter()->getConnection()->request($query);
//
//    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        $key = $data['key_crystal'];
        $RID = $data['rid'];

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_crystal = "%s" and rid = "%s"', $key, $RID)
        );
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();
        $RID = $entity->getRID();

        self::getAdapter()->delete(
            $name,
            sprintf('key_crystal = "%s" and rid = "%s"', $key, $RID)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $keyCrystal, string $RID): array
    {
        $name = self::getTableName();
        $data = [
            'key_crystal' => $keyCrystal,
            'rid' => $RID,
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