<?php

namespace Liloi\Rune;

use Liloi\Config\Pool;
use Liloi\Config\Sparkle;
use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Helper extends Personal
{
    private static $db = null;

    public static function defineConfig(): void
    {
        (function () {Pool::getSingleton()->set(new Sparkle('admin', function () {return self::$private['admin'];}));})();

        (function () {Pool::getSingleton()->set(new Sparkle('prefix', function () {return self::$private['prefix'];}));})();

        (function() {
            $connection = self::$private['connection'];
            Pool::getSingleton()->set(new Sparkle('connection', function () use ($connection) {
                return $connection;
            }));
        })();

        (new \Liloi\Rune\Application(Pool::getSingleton()));
    }

    public static function db()
    {
        if(self::$db === null)
        {
            $connection = Pool::getSingleton()->get('connection');
            self::$db = \mysqli_connect(
                $connection['host'],
                $connection['user'],
                $connection['password'],
                $connection['database'],
            );
        }

        return self::$db;
    }

    public static function request(string $sql)
    {
        $request = self::db()->query($sql);

        if(!$request) {
            return false;
        }

        if(!$request->num_rows) {
            return false;
        }

        return $request->fetch_assoc();
    }

    public static function one(string $sql)
    {
        $row = self::request($sql);

        if(!$row) {
            return false;
        }

        return reset($row);
    }

    public static function truncateDatabase(): void
    {
        $prefix = 'rune_';
        $tables = ['config', 'jobs', 'levels', 'logs', 'road'];

        self::db()->query('SET foreign_key_checks = 0');
        foreach ($tables as $table)
        {
            self::db()->query(sprintf('truncate table %s', $prefix . $table));
        }
        self::db()->query('SET foreign_key_checks = 1');
    }
}