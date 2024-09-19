<?php

namespace Liloi\Rune\Modules\Exams\Domain\Questions;

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
        return self::getTablePrefix() . 'exams_questions';
    }

    public static function loadCollection(string $key_item): Collection
    {
        $cache = 'questions:collection:' . $key_item;

        if(Cache::exists($cache))
        {
            $rows = Cache::get($cache);
        }
        else
        {
            $name = self::getTableName();

            $rows = self::getAdapter()->getArray(sprintf(
                'select * from %s where key_item="%s" order by title desc limit 100;',
                $name, $key_item
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

    public static function loadByTags(string $tags, string $RID): Collection
    {
        $cache = 'questions:load-by-tags:' . $RID . ':' . str_replace(' ', '-', $tags);

        if(Cache::exists($cache))
        {
            $rows = Cache::get($cache);
        }
        else
        {
            $name = self::getTableName();

            $rows = self::getAdapter()->getArray(sprintf(
                'select * from %s where tags like "%%%s%%" and rid like "%s%%" limit 100;',
                $name, $tags, $RID
            ));

            Cache::set($cache, $rows);
        }

        shuffle($rows);

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key_question): Entity
    {
        $RID = AtomsManager::URLtoATOM($_SERVER['REQUEST_URI']);
        $cache = 'questions:entity:' . $RID . ':key-' . $key_question;

        if(Cache::exists($cache))
        {
            $row = Cache::get($cache);
        }
        else
        {
            $name = self::getTableName();

            $row = self::getAdapter()->getRow(sprintf(
                'select * from %s where key_question="%s"',
                $name,
                $key_question
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
        $key = $data['key_question'];
//        unset($data['key_question']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_question = "%s"', $key)
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
            sprintf('key_question = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $key_item): array
    {
        Cache::remove('questions:collection:' . $key_item);
        Cache::remove('questions:load-by-tags:' . $key_item);

        $name = self::getTableName();
        $data = [
            'key_question' => date('Y-m-d H:i:s'),
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