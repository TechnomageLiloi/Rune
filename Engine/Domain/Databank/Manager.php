<?php

namespace Liloi\Rune\Domain\Databank;

use Liloi\Rune\Domain\Manager as DomainManager;
use Liloi\Rune\Exceptions\IncorrectException;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'databank';
    }

    /**
     * Load problem from database.
     *
     * @param string $RID
     * @return Entity
     */
    public static function load(string $RID, bool $isPublic = false): Entity
    {

        $name = self::getTableName();

        $sqlAccess = $isPublic ? 'status=2' : '1=1';

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where rid="%s" and %s',
            $name,
            $RID,
            $sqlAccess
        ));

        if(!$row)
        {
            if($isPublic)
            {
                throw new IncorrectException();
            }

            return self::create($RID);
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

        $RID = $data['rid'];

        self::update(
            $name,
            $data,
            sprintf('rid = "%s"', $RID)
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
            sprintf('rid = "%s"', $key)
        );
    }

    /**
     * Create problem in database.
     */
    public static function create(string $RID): Entity
    {
        $name = self::getTableName();
        $data = [
            'rid' => $RID,
            'status' => Statuses::CLOSED,
            'type' => Types::NEMO,
            'title' => $RID,
            'summary' => '// Summary',
            'tags' => '-',
            'ts' => date('Y-m-d H:i:s')
        ];

        self::getAdapter()->insert($name, $data);

        return Entity::create($data);
    }

    public static function URLtoRID(string $URL): string
    {
        $URL = trim($URL, '/');

        if(empty($URL))
        {
            throw new IncorrectException();
        }

        return str_replace('/', ':', strtolower($URL));
    }

    public static function RIDtoURL(string $RID): string
    {
        if(empty($RID))
        {
            throw new IncorrectException();
        }

        return '/' . str_replace(':', '/', $RID);
    }

    public static function loadFiles(string $RID, bool $isPublic = false): Collection
    {
        $name = self::getTableName();

        $sqlAccess = $isPublic ? 'status=2' : '1=1';

        $sql = sprintf(
            'select * from %s where (rid like "%s:%%") && (rid not like "%s:%%:%%") && %s order by title asc;',
            $name, $RID, $RID, $sqlAccess
        );

        $rows = self::getAdapter()->getArray($sql);

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function search(string $likeRID): Collection
    {
        $name = self::getTableName();

        $sql = sprintf(
            'select * from %s where rid like "%%%s%%" order by title asc;',
            $name, $likeRID
        );

        $rows = self::getAdapter()->getArray($sql);

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }
}