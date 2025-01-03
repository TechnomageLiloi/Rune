<?php

namespace Liloi\Rune\Modules;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(is_dir(__DIR__ . '/Levels'));

        $this->assertTrue(file_exists(__DIR__ . '/Modules.php'));
    }
}