<?php

namespace Liloi\Rune\Modules\Exams\Domain\Crystals;

class Statuses
{
    public const LOSE = 1;
    public const WIN = 2;

    public static $list = [
        self::LOSE => 'Lose',
        self::WIN => 'Win'
    ];
}