<?php

namespace Liloi\Rune\Modules\Maps\Domain\Teacher;

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
        return self::getTablePrefix() . 'teacher';
    }

    public static function loadCollection(string $keyAtom): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_dialog="%s" order by title asc limit 100;',
            $name, $keyAtom
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key_dialog): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_dialog="%s"',
            $name,
            $key_dialog
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        $key = $data['key_dialog'];

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_dialog = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $teacher, string $dialog): Entity
    {
        $name = self::getTableName();
        $data = [
            'key_dialog' => date('Y-m-d H:i:s'),
            'teacher' => $teacher,
            'dialog' => $dialog
        ];

        self::getAdapter()->insert($name, $data);

        return Entity::create($data);
    }
}