<?php

namespace Liloi\Rune\Domain\Atoms;

class Statuses
{
    public const CLOSED = 1;
    public const OPENED = 2;

    public static $list = [
        self::CLOSED => 'Closed',
        self::OPENED => 'Opened'
    ];
}