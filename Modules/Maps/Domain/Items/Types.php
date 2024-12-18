<?php

namespace Liloi\Rune\Modules\Maps\Domain\Items;

/**
 * Question's type.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Types
{
    public const NOTE = 1;
    public const CRYSTAL = 2;

    /**
     * Type list.
     *
     * @var string[]
     */
    public static $list = [
        self::NOTE => 'Note',
        self::CRYSTAL => 'Crystal',
    ];
}