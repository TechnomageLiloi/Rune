<?php

namespace Liloi\Rune\Modules\News\Domain\Topics;

/**
 * Question's statuses.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Statuses
{
    public const TODO = 1;
    public const COMPOSING = 2;
    public const PUBLISHED = 3;
    public const CLOSED = 4;
    public const OBSOLETE = 5;

    public static $list = [
        self::TODO => 'To Do',
        self::COMPOSING => 'Composing',
        self::PUBLISHED => 'Active',
        self::CLOSED => 'Closed',
        self::OBSOLETE => 'Obsolete'
    ];
}