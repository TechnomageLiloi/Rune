<?php

namespace Liloi\Rune\Domain\Atoms;

class Types
{
    public const DIRECTORY = 1;
    public const PROJECT = 2;
    public const VERSION = 3;

    static public array $list = [
        self::DIRECTORY => 'Directory',
        self::PROJECT => 'Project',
        self::VERSION => 'Version',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}