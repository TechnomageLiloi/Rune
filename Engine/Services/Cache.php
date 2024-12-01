<?php

namespace Liloi\Rune\Services;

use Liloi\Rune\Exceptions\NotFoundException;
use Liloi\Rune\Exceptions\AccessException;
use Liloi\Judex\Assert;
use Liloi\Rune\Security;

class Cache
{
    private const ENABLED = false;
    public const CACHE_DIR = ROOT_DIR . '/Cache';

    private static function keyToFilename(string $key, bool $block = false): string
    {
        $suffix = $block ? '' : '.json';
        return self::CACHE_DIR . '/' . str_replace(':', '/', $key) . $suffix;
    }

    public static function set(string $key, array $data): void
    {
        if(!self::ENABLED)
        {
            return;
        }

//        if(!Security::check())
//        {
//            return;
//        }

        $fil = self::keyToFilename($key);

        if(!is_dir(dirname($fil)))
        {
            if (!mkdir($concurrentDirectory = dirname($fil), 0777, true) && !is_dir($concurrentDirectory)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
        }

        file_put_contents($fil, json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    public static function get(string $key): array
    {
        if(!self::ENABLED)
        {
            throw new AccessException();
        }

//        if(!Security::check())
//        {
//            throw new AccessException();
//        }

        $fil = self::keyToFilename($key);

        if(!file_exists($fil))
        {
            throw new NotFoundException();
        }

        return (array)json_decode(file_get_contents($fil), true);
    }

    public static function exists(string $key): bool
    {
        if(!self::ENABLED)
        {
            return false;
        }

//        if(!Security::check())
//        {
//            return false;
//        }

        $fil = self::keyToFilename($key);
        return file_exists($fil);
    }

    public static function remove(string $key): void
    {
        $fil = self::keyToFilename($key);
        if(file_exists($fil))
        {
            unlink($fil);
            return;
        }

        $removeDir = function (string $dir) {
            $it = new \RecursiveDirectoryIterator($dir, \RecursiveDirectoryIterator::SKIP_DOTS);
            $files = new \RecursiveIteratorIterator($it, \RecursiveIteratorIterator::CHILD_FIRST);
            foreach($files as $file) {
                if ($file->isDir()){
                    rmdir($file->getPathname());
                } else {
                    unlink($file->getPathname());
                }
            }
            rmdir($dir);
        };

        $fil = self::keyToFilename($key, true);
        if(is_dir($fil))
        {
            $removeDir($fil);
        }
    }

    public static function getCollection(string $key): array
    {
        $dir = self::keyToFilename($key, true);

        if(!file_exists($dir))
        {
            return [];
        }

        Assert::true(is_dir($dir));

        $data = [];

        if ($handle = opendir($dir))
        {
            while (false !== ($entry = readdir($handle)))
            {
                if (in_array($entry, ['.', '..']))
                {
                    continue;
                }

                $path = $dir . '/' . $entry;

                if (is_dir($path))
                {
                    continue;
                }

                $fil = pathinfo($path, PATHINFO_FILENAME);
                $filKey = $key . ':' . $fil;
                $data[$filKey] = self::get($filKey);
            }

            closedir($handle);
        }

        return $data;
    }
}