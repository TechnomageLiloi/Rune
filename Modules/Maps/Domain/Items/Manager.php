<?php

namespace Liloi\Rune\Modules\Maps\Domain\Items;

use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
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
        return self::getTablePrefix() . 'items';
    }

    public static function loadCollection(string $RID): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where rid="%s" order by title asc limit 100;',
            $name, $RID
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadInventory(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where rid is null order by title asc limit 100;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key_npc): Entity
    {
        $RID = AtomsManager::URLtoATOM($_SERVER['REQUEST_URI']);

        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_npc="%s"',
            $name,
            $key_npc
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        $key = $data['key_npc'];

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_npc = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $keyAtom): array
    {
        $name = self::getTableName();
        $data = [
            'key_item' => $keyAtom,
            'title' => 'Enter the title',
            'description' => '// Description',
            'x' => 1,
            'y' => 1,
            'type' => Types::NOTE,
            'data' => '{}',
        ];

        self::getAdapter()->insert($name, $data);

        return $data;
    }
}