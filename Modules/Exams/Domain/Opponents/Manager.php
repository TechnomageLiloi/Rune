<?php

namespace Liloi\Rune\Modules\Exams\Domain\Opponents;

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
        return self::getTablePrefix() . 'opponents';
    }

    public static function load(string $key_opponent, string $RID): Entity
    {
        $name = self::getTableName();
        Assert::notEmpty($key_opponent);

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_opponent="%s" and rid="%s"',
            $name, $key_opponent, $RID
        ));

        if(!$row)
        {
            return self::create($key_opponent, $RID);
        }

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $keyOpponent = $data['key_opponent'];

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_opponent="%s" and rid="%s"', $keyOpponent, $data['rid'])
        );
    }

    public static function create(string $key_opponent, string $RID): Entity
    {
        $name = self::getTableName();
        $data = [
            'key_opponent' => $key_opponent,
            'rid' => $RID,
            'specie' => 1,
            'title' => 'Question title',
            'type' => 1,
            'program' => '{}',
            'theory' => 'Question theory',
        ];

        self::getAdapter()->insert($name, $data);

        return Entity::create($data);
    }
}