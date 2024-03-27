<?php

namespace Liloi\Rune\Domain\Tickets;

use Liloi\API\Errors\Exception;
use Liloi\Rune\Domain\Manager as DomainManager;
use Liloi\Judex\Assert;

class Manager extends DomainManager
{
    public const POWER = '1';
    public const TIME_TODO = '00:00:00';

    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'tickets';
    }

    /**
     * Load problem from database.
     *
     * @param string $keyTicket
     * @return Entity
     * @throws Exception
     */
    public static function load(string $keyTicket): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_ticket="%s"',
            $name,
            $keyTicket
        ));

        if(!$row)
        {
            throw new Exception('Unknown ticket key.');
        }

        return Entity::create($row);
    }

    /**
     * Save problem to database.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_ticket'];
        unset($data['key_ticket']);

        self::update(
            $name,
            $data,
            sprintf('key_ticket = "%s"', $key)
        );
    }

    /**
     * Remove problem from database.
     *
     * @param Entity $entity
     */
    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_ticket = "%s"', $key)
        );
    }

    /**
     * Create problem in database.
     */
    public static function create(string $key_atom): Entity
    {
        $name = self::getTableName();
        $data = [
            'key_atom' => $key_atom,
            'title' => '-',
            'start' => date('Y-m-d H:i:s'),
            'finish' => self::TIME_TODO,
            'power' => self::POWER,
            'status' => Statuses::TODO
        ];

        self::getAdapter()->insert($name, $data);

        $data['key_ticket'] = \mysqli_insert_id(self::getAdapter()->getConnection()->get());
        return Entity::create($data);
    }
}