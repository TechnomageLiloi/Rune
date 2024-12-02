<?php

namespace Liloi\Rune\Domain\Atoms;

class Types
{
    /**
     * Atom type to write databank pages (like wiki ones).
     */
    public const SCROLL = 1;

    /**
     * List of atom types.
     *
     * @var string[]
     */
    public static $list = [
        self::SCROLL => 'Scroll'
    ];
}