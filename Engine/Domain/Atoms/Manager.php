<?php

namespace Liloi\Rune\Domain\Atoms;

use Liloi\Rune\Domain\Manager as DomainManager;
use Liloi\Rune\Exceptions\IncorrectException;
use Liloi\Rune\Services\Cache;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return 'rune';
    }

    /**
     * Load problem from database.
     *
     * @param string $RID
     * @return Entity
     */
    public static function load(string $RID, bool $isPublic = false): Entity
    {
        $cache = 'atoms:entity:' . $RID;

        if(Cache::exists($cache))
        {
            $row = Cache::get($cache);
        }
        else
        {
            $name = self::getTableName();

            $sqlAccess = $isPublic ? 'status=2' : '1=1';

            $row = self::getAdapter()->getRow(sprintf(
                'select * from %s where rid="%s" and %s',
                $name,
                $RID,
                $sqlAccess
            ));

            Cache::set($cache, $row);
        }

        if(!$row)
        {
            throw new IncorrectException();
            //return self::create($rid);
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
        $RID = $data['rid'];
        unset($data['rid']);

        self::update(
            $name,
            $data,
            sprintf('rid = "%s"', $RID)
        );

        Cache::remove('atoms:entity:' . $RID);
        Cache::remove('atoms:files:' . $RID);
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
    public static function create(string $RID): Entity
    {
        $name = self::getTableName();
        $data = [
            'rid' => $RID,
            'title' => $RID,
            'program' => '// ' . $RID,
            'status' => Statuses::CLOSED
        ];

        self::getAdapter()->insert($name, $data);

        Cache::remove('atoms:entity:' . $RID);
        Cache::remove('atoms:files:' . $RID);

        return Entity::create($data);
    }

    public static function URLtoATOM(string $URL): string
    {
        return str_replace('/', ':', trim($URL, '/')) ?: 'rune';
    }

    public static function ATOMtoURL(string $keyAtom): string
    {
        if($keyAtom === 'rune')
        {
            return '/';
        }

        return '/' . str_replace(':', '/', $keyAtom);
    }

    public static function loadFiles(string $RID, bool $isPublic = false): Collection
    {
        $cache = 'atoms:files:' . $RID;

        if(Cache::exists($cache))
        {
            $rows = Cache::get($cache);
        }
        else
        {
            $name = self::getTableName();

            $sqlAccess = $isPublic ? 'status=2' : '1=1';

            $sql = sprintf(
                'select * from %s where (rid like "%s:%%") && (rid not like "%s:%%:%%") && %s order by title asc;',
                $name, $RID, $RID, $sqlAccess
            );

            $rows = self::getAdapter()->getArray($sql);

            Cache::set($cache, $rows);
        }

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }
}