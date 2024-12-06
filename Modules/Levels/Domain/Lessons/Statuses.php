<?php

namespace Liloi\Rune\Modules\Levels\Domain\Lessons;

class Statuses
{
    public const DEVELOP = 1;
    public const TODO = 2;
    public const COMPLETE = 3;
    public const ARCHIVE = 4;

    public static $list = [
        self::DEVELOP => 'Develop',
        self::TODO => 'To Do',
        self::COMPLETE => 'Complete',
        self::ARCHIVE => 'Archive',
    ];
}