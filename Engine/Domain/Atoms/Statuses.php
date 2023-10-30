<?php

namespace Liloi\PoP\Domain\Atoms;

class Statuses
{
    public const TODO = 1;
    public const IN_HANDS = 2;
    public const INDIVIDUAL = 3;
    public const PUBLISHED = 4;

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