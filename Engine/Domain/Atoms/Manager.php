<?php

namespace Liloi\Rune\Domain\Atoms;

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

    // @todo: rise this method to more abstract level.
    public static function create(string $keySuperAtom): void
    {
        $name = self::getTableName();

        self::getAdapter()->insert($name, [
            'key_atom' => $keySuperAtom . ':date-' . gmdate('Y-m-d-H-i-s'),
            'title' => 'Enter the title',
            'status' => Statuses::TODO,
            'type' => Types::DIRECTORY,
            'summary' => 'Enter the summary',
            'program' => 'Enter the program',
            'data' => '{}',
            'tags' => 'enter the tags',
            'ts' => gmdate('Y-m-d H:i:s')
        ]);
    }

    public static function load(string $keyAtom): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_atom="%s";',
            $name, $keyAtom
        ));

        if(!$row)
        {
            throw new \Exception('Not found.');
        }

        return Entity::create($row);
    }

    public static function loadFiles(string $keyAtom, bool $onlyPublished = false): Collection
    {
        $name = self::getTableName();

        if($onlyPublished)
        {
            $sql = sprintf(
                'select * from %s where (status in (4,5,6)) && (key_atom like "%s:%%") && (key_atom not like "%s:%%:%%") order by ts asc;',
                $name, $keyAtom, $keyAtom
            );
        }
        else
        {
            $sql = sprintf(
                'select * from %s where (key_atom like "%s:%%") && (key_atom not like "%s:%%:%%") order by ts asc;',
                $name, $keyAtom, $keyAtom
            );
        }

        $rows = self::getAdapter()->getArray($sql);

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_atom']);

        self::update($name, $data, sprintf('key_atom="%s"', $entity->getKey()));
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        self::getAdapter()->delete($name, sprintf('key_atom="%s"', $entity->getKey()));
    }

    public static function URLtoATOM(string $URL): string
    {
        $lower = strtolower(trim($URL, '/'));

        if(in_array($lower, ['', 'rune']))
        {
            return 'rune';
        }

        return 'rune:' . str_replace('/', ':', $lower);
    }

    public static function ATOMtoURL(string $keyAtom): string
    {
        if($keyAtom === 'rune')
        {
            return '/';
        }

        $lower = strtolower(str_replace('rune:', '', $keyAtom));
        return '/' . str_replace(':', '/', $lower);
    }

    public static function ridChange(string $ridOld, string $ridNew): void
    {
        $nameTable = self::getTableName();
        self::getAdapter()->request(sprintf(
            'update %s set key_atom = "%s" where key_atom = "%s"',
            $nameTable,
            $ridNew,
            $ridOld
        ));
    }
}