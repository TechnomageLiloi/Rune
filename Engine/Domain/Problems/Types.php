<?php

namespace Liloi\Rune\Domain\Problems;

/**
 * Types of problems.
 *
 * @package Liloi\Rune\Domain\Problems
 */
class Types
{
    public const FREEDOM = 1;
    public const BIOTECH = 2;
    public const EXAMS = 3;
    public const PROJECTS = 4;
    public const HORCRUXES = 5;
    public const ARTIFACTS = 6;
    public const FAMILY = 7;

    public static $list = [
        self::FREEDOM => 'Freedom',
        self::BIOTECH => 'Biotech',
        self::EXAMS => 'Exams',
        self::PROJECTS => 'Projects',
        self::HORCRUXES => 'Horcruxes',
        self::ARTIFACTS => 'Artifacts',
        self::FAMILY => 'Family',
    ];
}