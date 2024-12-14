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

    /**
     * Type list.
     *
     * @var string[]
     */
    public static $list = [
        self::NOTE => 'Note',
    ];
}