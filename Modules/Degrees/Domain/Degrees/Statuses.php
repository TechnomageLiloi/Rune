<?php

namespace Liloi\Rune\Modules\Degrees\Domain\Degrees;

class Statuses
{
    public const NOT_DEFENDED = 1;
    public const DEFENDED = 2;
    public const DEFENDING = 3;

    public static $list = [
        self::NOT_DEFENDED => 'Not defended degree',
        self::DEFENDING => 'Defending now degree',
        self::DEFENDED => 'Defended degree',
    ];
}