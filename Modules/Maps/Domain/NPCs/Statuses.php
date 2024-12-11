<?php

namespace Liloi\Rune\Modules\Maps\Domain\NPCs;

/**
 * Question's type.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Statuses
{
    public const TEACHER = 1;

    /**
     * Type list.
     *
     * @var string[]
     */
    public static $list = [
        self::TEACHER => 'Teacher',
    ];
}