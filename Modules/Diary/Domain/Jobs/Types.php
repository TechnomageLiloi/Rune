<?php

namespace Liloi\Rune\Modules\Diary\Domain\Jobs;

/**
 * Class diary types.
 */
class Types
{
    public const SHIP = 1;
    public const BIOTECH = 2;
    public const BUSINESS = 3;
    public const JOURNAL = 4;
    public const PROJECTS = 5;
    public const TROUBLE = 6;
    public const FAMILY = 7;

    // @ToDo: To more abstract level with redefine.
    static public array $list = [
        self::SHIP => 'Ship',
        self::BIOTECH => 'Biotech',
        self::BUSINESS => 'Business',
        self::JOURNAL => 'Journal',
        self::PROJECTS => 'Projects',
        self::TROUBLE => 'Trouble',
        self::FAMILY => 'Family',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}