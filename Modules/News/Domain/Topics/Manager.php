<?php

namespace Liloi\Rune\Modules\News\Domain\Topics;

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
        return self::getTablePrefix() . 'topics';
    }

    public static function loadCollection(): Collection
    {

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_topic desc limit 100;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key_topic): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_topic="%s"',
            $name,
            $key_topic
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        $key = $data['key_topic'];

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_topic = "%s"', $key)
        );
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_topic = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $key_atom): array
    {
        $name = self::getTableName();
        $data = [
            'key_atom' => $key_atom,
            'title' => 'Enter the title',
            'status' => Statuses::TODO,
            'summary' => '// Summary',
            'tags' => 'tags',
            'dt' => date('Y-m-d H:i:s'),
            'data' => '{}',
        ];
        self::getAdapter()->insert($name, $data);

        return $data;
    }
}