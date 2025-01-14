<?php

namespace Liloi\Rune\Modules\Exams\Domain\Opponents;

/**
 * Opponents species.
 */
class Species
{
    public const MEDICAL_ROBOT = 1;
    public const BOMB = 2;

    public static $list = [
        self::MEDICAL_ROBOT => 'Medical robot',
        self::BOMB => 'Bomb',
    ];

    public static $start = [
        self::MEDICAL_ROBOT => 'Medical robot is very nasty. Syringes, thick needles, colonoscopy tube and other things to inject and get into you.',
        self::BOMB => 'Bomb is combination of explosive and detonator with timer.'
    ];

    public static $finish = [
        self::MEDICAL_ROBOT => 'Medical robot is disabled. Congratulations!',
        self::BOMB => 'You are disarmed this bomb.',
    ];
}