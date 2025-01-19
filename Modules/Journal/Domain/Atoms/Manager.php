<?php

namespace Liloi\Rune\Modules\Journal\Domain\Atoms;

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
        return self::getTablePrefix() . 'atoms';
    }

    public static function loadCollection(string $keyDay): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_day = "%s" order by key_atom desc;',
            $name, $keyDay
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $keyHour, string $keyAtom): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_day="%s" and key_atom="%s"',
            $name, $keyHour, $keyAtom
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        self::getAdapter()->update(
            $name,
            $data,
            sprintf(
                'key_day="%s" and key_atom="%s"',
                $data['key_day'],
                $data['key_atom']
            )
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(
        string $keyDay,
        string $goal = 'Enter the goal.',
        $status = Statuses::TODO
    ): void
    {
        $name = self::getTableName();

        self::getAdapter()->insert($name, [
            'key_day' => $keyDay,
            'key_atom' => self::getNextKey($keyDay),
            'goal' => $goal,
            'status' => $status,
            'xp' => 0,
            'start' => date('Y-m-d H:i:s'),
            'finish' => date('Y-m-d H:i:s'),
        ]);
    }

    private static function getNextKey(string $keyDay): int
    {
        $name = self::getTableName();

        $key = self::getAdapter()->getSingle(sprintf(
            'select key_atom from %s where key_day="%s" order by key_atom desc;',
            $name, $keyDay
        ));

        if($key === false)
        {
            return 0;
        }

        ++$key;

        return $key;
    }
}