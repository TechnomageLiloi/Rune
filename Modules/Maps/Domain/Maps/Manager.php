<?php

namespace Liloi\Rune\Modules\Maps\Domain\Maps;

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
        return self::getTablePrefix() . 'maps';
    }

    public static function loadCollection(string $keyAtom): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_map="%s" order by title asc limit 100;',
            $name, $keyAtom
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key_map): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_map="%s"',
            $name,
            $key_map
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_map'];
//        unset($data['key_question']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_map = "%s"', $key)
        );

        $RID = AtomsManager::URLtoATOM($_SERVER['REQUEST_URI']);

    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_map = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $idMap): array
    {
        $name = self::getTableName();
        $data = [
            'id_map' => $idMap,
            'title' => 'Enter the title',
            'map' => "...\n...\n...",
            'objects' => '{}',
        ];

        self::getAdapter()->insert($name, $data);

        return $data;
    }
}