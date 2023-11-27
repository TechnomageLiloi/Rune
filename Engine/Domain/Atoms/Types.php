<?php

namespace Liloi\Rune\Domain\Atoms;

class Types
{
    public const DIRECTORY = 1;
    public const PROJECT = 2;
    public const VERSION = 3;
    public const LINK = 4;
    public const ARCHIVE = 5;
    public const GOOGLE_DOCUMENT = 6;
    public const GOOGLE_SPREADSHEET = 7;
    public const FRAME = 8;
    public const ARTIFACT = 9;

    static public array $list = [
        self::DIRECTORY => 'Directory',
        self::PROJECT => 'Project',
        self::ARTIFACT => 'Artifact',
        self::VERSION => 'Version',
        self::LINK => 'Link',
        self::ARCHIVE => 'Archive',
        self::GOOGLE_DOCUMENT => 'Google Document',
        self::GOOGLE_SPREADSHEET => 'Google Spreadsheet',
        self::FRAME => 'Frame',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}