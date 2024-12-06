<?php

namespace Liloi\Rune\Modules\Levels\Domain\Lessons;

use Liloi\Rune\Domain\Manager as DomainManager;
use Liloi\Rune\Modules\Degrees\Domain\Degrees\Collection as DegreesCollection;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'degrees_lessons';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_lesson asc;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadGroup(): array
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_lesson asc;',
            $name
        ));

        $group = [];

        foreach($rows as $row)
        {
            if(!isset($group[$row['key_degree']]))
            {
                $group[$row['key_degree']] = new Collection();
            }

            $group[$row['key_degree']][] = Entity::create($row);
        }

        return $group;
    }

    public static function load(string $key): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_lesson="%s"',
            $name,
            $key
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_lesson'];
        unset($data['key_lesson']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_lesson = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, [
            'key_degree' => 1, // @todo: const extract magic number.
            'title' => 'Enter the lesson title',
            'status' => Statuses::DEVELOP,
            'program' => '// comment'
        ]);
    }
}