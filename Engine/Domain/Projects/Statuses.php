<?php

namespace Liloi\Rune\Domain\Projects;

class Statuses
{
    public const FUTURE = 1;
    public const PRESENT = 2;
    public const PAST = 3;

    public static $list = [
        self::FUTURE => 'Future',
        self::PRESENT => 'Present',
        self::PAST => 'Past',
    ];
}