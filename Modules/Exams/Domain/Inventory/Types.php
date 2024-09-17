<?php

namespace Liloi\Rune\Modules\Exams\Domain\Inventory;

/**
 * Question's type.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Types
{
    public const PUZZLE = 1;

    /**
     * Type list.
     *
     * @var string[]
     */
    public static $list = [
        self::PUZZLE => 'Puzzle',
    ];
}