<?php

namespace Liloi\Rune\Modules\Exams\Domain\Inventory;

/**
 * Question's type.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Types
{
    public const BAR = 1;
    public const PUZZLE = 2;

    /**
     * Type list.
     *
     * @var string[]
     */
    public static $list = [
        self::BAR => 'Bar',
        self::PUZZLE => 'Puzzle',
    ];
}