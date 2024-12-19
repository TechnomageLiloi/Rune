<?php

namespace Liloi\Rune\Modules\Maps\Domain\Items;

/**
 * Question's type.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Types
{
    public const INGOT = 1;
    public const NOTE = 2;
    public const PORTAL = 3;
    public const CRYSTAL = 4;

    /**
     * Type list.
     *
     * @var string[]
     */
    public static $list = [
        self::INGOT => 'Ingot',
        self::NOTE => 'Node',
        self::PORTAL => 'Portal',
        self::CRYSTAL => 'Crystal',
    ];
}