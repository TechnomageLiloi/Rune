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
        return self::getTablePrefix() . 'atoms';
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
                'select * from %s where key_atom="%s" and %s',
                $name,
                $RID,
                $sqlAccess
            ));

            Cache::set($cache, $row);
        }

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

        // @todo: Get param name from const.
        $RID = $data['key_atom'];
//        unset($data['rid']);

        self::update(
            $name,
            $data,
            sprintf('key_atom = "%s"', $RID)
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
            'key_atom' => $RID,
            'title' => $RID,
            'program' => '// Program',
            'status' => Statuses::CLOSED,
            'data' => '{}',
            'wiki' => '// Wiki'
        ];

        self::getAdapter()->insert($name, $data);

        Cache::remove('atoms:entity:' . $RID);
        Cache::remove('atoms:files:' . $RID);

        return self::load($RID);
    }

    public static function URLtoATOM(string $URL): string
    {
        $output = 'rune';

        if($URL === '/' || $URL === '/rune')
        {
            return $output;
        }

        $parts = str_replace('/', ':', trim($URL, '/'));

        return $output . ':' . str_replace('rune:', '', $parts);
    }

    public static function ATOMtoURL(string $keyAtom): string
    {
        if($keyAtom === 'rune')
        {
            return '/rune';
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
                'select * from %s where (key_atom like "%s:%%") && (key_atom not like "%s:%%:%%") && %s order by title asc;',
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