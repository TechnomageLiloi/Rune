<?php

namespace Liloi\Rune\Domain\Problems;

/**
 * Types of problems.
 *
 * @package Liloi\Rune\Domain\Problems
 */
class Types
{
    public const CODEX = 1;
    public const BIOTECH = 2;
    public const EXAMS = 3;
    public const PROJECTS = 4;
    public const ARTIFACTS = 5;
    public const HORCRUXES = 6;
    public const FAMILY = 7;

    public static $list = [
        self::CODEX => 'Codex',
        self::BIOTECH => 'Biotech',
        self::EXAMS => 'Exams',
        self::PROJECTS => 'Projects',
        self::ARTIFACTS => 'Artifacts',
        self::HORCRUXES => 'Horcruxes',
        self::FAMILY => 'Family',
    ];
}