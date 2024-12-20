<?php

namespace Liloi\Rune\Modules\Exams\Domain\NPC;

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
        return self::getTablePrefix() . 'npcs';
    }

    public static function loadCollection(string $keyAtom): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_npc="%s" order by title asc limit 100;',
            $name, $keyAtom
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

        // @todo: Get param name from const.
        $key = $data['key_npc'];

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_npc = "%s"', $key)
        );
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_npc = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $RID): array
    {
        $name = self::getTableName();
        $data = [
            'rid' => $RID,
            'title' => 'Enter the title',
            'description' => '// Description',
            'data' => '{}',
        ];

        self::getAdapter()->insert($name, $data);

        return $data;
    }
}