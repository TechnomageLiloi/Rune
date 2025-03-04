<?php

namespace Liloi\Rune\Modules\Exams\Domain\Quests;

use Liloi\Rune\Domain\Manager as DomainManager;
use Liloi\Judex\Assert;

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
        return self::getTablePrefix() . 'quests';
    }

    public static function load(string $keyQuest, string $key_map): Entity
    {
        $name = self::getTableName();
        Assert::notEmpty($keyQuest);

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_quest="%s" and key_map="%s"',
            $name, $keyQuest, $key_map
        ));

        if(!$row)
        {
            return self::create($keyQuest, $key_map);
        }

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $keyOpponent = $data['key_quest'];

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_quest="%s" and key_map="%s"', $keyOpponent, $data['key_map'])
        );
    }

    public static function create(string $key_quest, string $key_map): Entity
    {
        $name = self::getTableName();
        $data = [
            'key_quest' => $key_quest,
            'key_map' => $key_map,
            'title' => 'Question title',
            'type' => 1,
            'program' => '{}',
            'theory' => 'Question theory',
        ];

        self::insert($name, $data);

        return Entity::create($data);
    }
}