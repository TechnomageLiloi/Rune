<?php

namespace Liloi\Rune\Domain\Artifacts;

class Types
{
    public const SIMPLE_FILE = 1;
    public const GOOGLE_DOC = 2;

    public static $list = [
        self::SIMPLE_FILE => 'Simple File',
        self::GOOGLE_DOC => 'Google Doc',
    ];
}