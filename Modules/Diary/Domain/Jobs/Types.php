<?php

namespace Liloi\Rune\Modules\Diary\Domain\Jobs;

/**
 * Jobs types.
 */
class Types
{
    public const HOME = 1;
    public const BIOTECH = 2;
    public const SOCIAL = 3;
    public const WIKI = 4;
    public const PROJECT = 5;
    public const WEAKNESS = 6;
    public const FAMILY = 7;

    static public array $list = [
        self::HOME => 'Home',
        self::BIOTECH => 'Biotech',
        self::SOCIAL => 'Social',
        self::WIKI => 'Wiki',
        self::PROJECT => 'Project',
        self::WEAKNESS => 'Weakness',
        self::FAMILY => 'Family',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}