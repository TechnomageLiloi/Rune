<?php

namespace Liloi\Rune\Modules\Exams\Domain\Opponents;

/**
 * Opponents species.
 */
class Species
{
    public const MEDICAL_ROBOT = 1;

    public static $list = [
        self::MEDICAL_ROBOT => 'Medical robot'
    ];

    public static $start = [
        self::MEDICAL_ROBOT => 'Medical robot is very nasty. Syringes, thick needles, colonoscopy tube and other things to inject and get into you.'
    ];

    public static $finish = [
        self::MEDICAL_ROBOT => 'Medical robot is disabled. Congratulations!'
    ];
}