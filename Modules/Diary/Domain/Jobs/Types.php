<?php

namespace Liloi\Rune\Modules\Diary\Domain\Jobs;

/**
 * Class diary types.
 */
class Types
{
    public const CODEX = 1;
    public const BIOTECH = 2;
    public const MENTAT = 3;
    public const PRIOR = 4;
    public const ARTIFACTS = 5;
    public const PROBLEMS = 6;
    public const DREAMS = 7;

    // @ToDo: To more abstract level with redefine.
    static public array $list = [
        self::CODEX => 'Codex',
        self::BIOTECH => 'Biotech',
        self::MENTAT => 'Mentat',
        self::PRIOR => 'Prior',
        self::ARTIFACTS => 'Artifacts',
        self::PROBLEMS => 'Problems',
        self::DREAMS => 'Dreams',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}