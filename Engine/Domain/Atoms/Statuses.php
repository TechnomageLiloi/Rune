<?php

namespace Liloi\Rune\Domain\Atoms;

class Statuses
{
    /**
     * Atom will be written in future.
     */
    public const TODO = 1;

    /**
     * Atom is written now.
     */
    public const IN_HANDS = 2;

    /**
     * Atom is private, accessible to author.
     */
    public const INDIVIDUAL = 3;

    /**
     * Atom is published, accessible to all.
     */
    public const PUBLISHED = 4;

    /**
     * List of statuses.
     *
     * @var string[]
     */
    static public array $list = [
        self::TODO => 'To Do',
        self::IN_HANDS => 'In hands',
        self::INDIVIDUAL => 'Individual',
        self::PUBLISHED => 'Published',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}