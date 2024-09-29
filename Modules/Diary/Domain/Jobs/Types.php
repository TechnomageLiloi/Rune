<?php

namespace Liloi\Rune\Modules\Diary\Domain\Jobs;

/**
 * Jobs types.
 */
class Types
{
    public const PERIOD = 1;
    public const BIOTECH = 2;
    public const SOCIAL = 3;
    public const WIKI = 4;
    public const PROJECTS = 5;
    public const WEAKNESS = 6;
    public const FAMILY = 7;

    static public array $list = [
        self::PERIOD => 'Period',
        self::BIOTECH => 'Biotech',
        self::SOCIAL => 'Social',
        self::WIKI => 'Wiki',
        self::PROJECTS => 'Projects',
        self::WEAKNESS => 'Weakness',
        self::FAMILY => 'Family',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}