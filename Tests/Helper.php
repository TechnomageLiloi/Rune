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
    }

    public static function truncateDatabase(): void
    {
        $prefix = 'rune_';
        $tables = [
            $prefix . 'atoms',
            $prefix . 'config',
            $prefix . 'logs'
        ];
        $connection = Pool::getSingleton()->get('connection');
        $db = \mysqli_connect(
            $connection['host'],
            $connection['user'],
            $connection['password'],
            $connection['database'],
        );

        foreach ($tables as $table)
        {
            $db->query(sprintf('truncate table %s', $table));
        }
    }
}