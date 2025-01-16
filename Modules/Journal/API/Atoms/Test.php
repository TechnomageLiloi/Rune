<?php

namespace Liloi\Rune\Modules\Journal\API\Atoms;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(is_dir(__DIR__ . '/Create'));
        $this->assertTrue(is_dir(__DIR__ . '/Edit'));
        $this->assertTrue(is_dir(__DIR__ . '/Save'));
    }
}