<?php

namespace Liloi\Rune\Modules\Degrees\Domain\Lessons;

class Statuses
{
    public const DEVELOP = 1;
    public const TODO = 2;
    public const COMPLETE = 3;
    public const OBSOLETE = 4;

    public static $list = [
        self::DEVELOP => 'Develop',
        self::TODO => 'To Do',
        self::COMPLETE => 'Complete',
        self::OBSOLETE => 'Obsolete',
    ];
}