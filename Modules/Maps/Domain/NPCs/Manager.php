<?php

namespace Liloi\Rune\Modules\Maps\Domain\NPCs;

use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
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
        return self::getTablePrefix() . 'npcs';
    }

    public static function loadCollection(string $keyAtom): Collection
    {
        $cache = 'questions:collection:' . $keyAtom;

        if(Cache::exists($cache))
        {
            $rows = Cache::get($cache);
        }
        else
        {
            $name = self::getTableName();

            $rows = self::getAdapter()->getArray(sprintf(
                'select * from %s where key_npc="%s" order by title asc limit 100;',
                $name, $keyAtom
            ));

            Cache::set($cache, $rows);
        }

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
        $cache = 'questions:entity:' . $RID . ':key-' . $key_npc;

        if(Cache::exists($cache))
        {
            $row = Cache::get($cache);
        }
        else
        {
            $name = self::getTableName();

            $row = self::getAdapter()->getRow(sprintf(
                'select * from %s where key_npc="%s"',
                $name,
                $key_npc
            ));

            Cache::set($cache, $row);
        }

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_npc'];
//        unset($data['key_question']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_npc = "%s"', $key)
        );

        $RID = AtomsManager::URLtoATOM($_SERVER['REQUEST_URI']);
        Cache::remove('questions:entity:' . $RID . ':key-' . $key);
        Cache::remove('questions:collection:' . $RID);
        Cache::remove('questions:load-by-tags:' . $RID);
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
    public static function create(string $keyAtom): array
    {
        $name = self::getTableName();
        $data = [
            'key_atom' => $keyAtom,
            'title' => 'Enter the title',
            'description' => '// Description',
            'status' => Statuses::TEACHER,
            'type' => Types::TEACHER,
            'data' => '{}',
        ];

        self::getAdapter()->insert($name, $data);

        return $data;
    }
}