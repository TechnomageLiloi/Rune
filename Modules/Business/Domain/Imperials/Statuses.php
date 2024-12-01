<?php

namespace Liloi\Rune\Modules\Business\Domain\Imperials;

class Statuses
{
    public const LOCK = 1;
    public const ACCUMULATE = 2;
    public const READY = 3;
    public const COMPLETED = 4;
    public const CONTINUUM = 5;
    public const OBSOLETE = 6;

    public static $list = [
        self::LOCK => 'Lock',
        self::ACCUMULATE => 'Accumulate',
        self::READY => 'Ready',
        self::COMPLETED => 'Completed',
        self::CONTINUUM => 'Continuum',
        self::OBSOLETE => 'Obsolete',
    ];
}