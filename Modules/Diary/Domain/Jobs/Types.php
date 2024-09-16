<?php

namespace Liloi\Rune\Modules\Diary\Domain\Jobs;

/**
 * Class diary types.
 */
class Types
{
    public const JUDGE = 1;
    public const SPORTSMAN = 2;
    public const SCIENTIST = 3;
    public const JOURNALIST = 4;
    public const RESEARCHER = 5;
    public const TROUBLESOLVER = 6;
    public const FATHER = 7;

    // @ToDo: To more abstract level with redefine.
    static public array $list = [
        self::JUDGE => 'Judge',
        self::SPORTSMAN => 'Sportsman',
        self::SCIENTIST => 'Scientist',
        self::JOURNALIST => 'Journalist',
        self::RESEARCHER => 'Researcher',
        self::TROUBLESOLVER => 'Troublesolver',
        self::FATHER => 'Father',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}