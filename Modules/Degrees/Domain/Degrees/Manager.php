<?php

namespace Liloi\Rune\Modules\Degrees\Domain\Degrees;

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
        return self::getTablePrefix() . 'degrees';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_degree asc;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_degree="%s"',
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
        $key = $data['key_degree'];
        unset($data['key_degree']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_degree = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, [
            'title' => 'Enter the title',
            'status' => Statuses::NOT_DEFENDED,
            'program' => '// comment',
            'resource' => 'Wool',
        ]);
    }

    public static function getList(): array
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select key_degree, title from %s where status="%s" order by key_degree asc;',
            $name, Statuses::DEFENDED
        ));

        $listDefended = [];

        foreach($rows as $row)
        {
            $listDefended[$row['key_degree']] = $row['title'];
        }

        return $listDefended;
    }

    public static function getListResource(): array
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select key_degree, resource from %s where status="%s" order by key_degree asc;',
            $name, Statuses::DEFENDED
        ));

        $listDefended = [];

        foreach($rows as $row)
        {
            $listDefended[$row['key_degree']] = $row['resource'];
        }

        return $listDefended;
    }
}