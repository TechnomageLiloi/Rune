<?php

namespace Liloi\Rune\Domain\Atoms;

class Statuses
{
    /**
     * Private atom; seen only for gamer.
     */
    public const CLOSED = 1;

    /**
     * Public atom; seen for all.
     */
    public const OPENED = 2;

    /**
     * List of atom statuses.
     *
     * @var string[]
     */
    public static $list = [
        self::CLOSED => 'Closed',
        self::OPENED => 'Opened'
    ];
}