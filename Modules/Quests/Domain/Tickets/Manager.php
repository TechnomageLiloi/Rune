<?php

namespace Liloi\Rune\Modules\Quests\Domain\Tickets;

use Liloi\Rune\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'tickets';
    }

    public static function loadCollection(string $keyQuest): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_quest="%s" order by key_ticket desc;',
            $name, $keyQuest
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadGroup(array $keyQuests): array
    {
        if(!$keyQuests)
        {
            return [];
        }

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_quest in (%s) order by key_ticket desc;',
            $name, implode(',', $keyQuests)
        ));

        $group = [];

        /** @var array $row */
        foreach($rows as $row)
        {
            $keyQuest = $row['key_quest'];

            if(!isset($group[$keyQuest]))
            {
                $group[$keyQuest] = new Collection();
            }

            $group[$keyQuest][] = Entity::create($row);
        }

        return $group;
    }

    /**
     * Load day by key.
     *
     * @param string $keyTicket
     * @param string $keyQuest
     * @return Entity
     */
    public static function load(string $keyQuest, string $keyTicket): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_quest="%s" and key_ticket="%s";',
            $name, $keyQuest, $keyTicket
        ));

        if(!$row)
        {
            // @todo: throw exception
        }

        return Entity::create($row);
    }

    /**
     * Load current day.
     *
     * @return Entity
     */
    public static function loadCurrent(): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s order by key_ticket desc limit 1;',
            $name
        ));

        return Entity::create($row);
    }

    /**
     * Save day.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
//        unset($data['key_job']);

        self::update($name, $data, sprintf('key_ticket="%s"', $entity->getKey()));
    }

    /**
     * Create new day.
     *
     * @param string $keyQuest
     * @return Entity
     */
    public static function create(string $keyQuest): Entity
    {
        $data = [
            'key_quest' => $keyQuest,
            'title' => '-'
        ];

        self::getAdapter()->insert(self::getTableName(), $data);

        return Entity::create($data);
    }
}