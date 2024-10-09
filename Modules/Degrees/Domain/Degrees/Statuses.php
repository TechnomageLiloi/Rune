<?php

namespace Liloi\Rune\Modules\Degrees\Domain\Degrees;

class Statuses
{
    public const ACTIVE = 1;
    public const PASSIVE = 2;

    public static $list = [
        self::ACTIVE => 'Active user',
        self::PASSIVE => 'Passive user',
    ];
}