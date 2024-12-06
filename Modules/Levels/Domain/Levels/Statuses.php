<?php

namespace Liloi\Rune\Modules\Degrees\Domain\Levels;

class Statuses
{
    public const NOT_DEFENDED = 1;
    public const DEFENDED = 2;
    public const DEFENDING = 3;

    public static $list = [
        self::NOT_DEFENDED => 'Not defended level',
        self::DEFENDING => 'Defending now level',
        self::DEFENDED => 'Defended level',
    ];
}