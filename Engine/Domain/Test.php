<?php

namespace Liloi\Rune\Domain;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(is_dir(__DIR__ . '/Config'));
        $this->assertTrue(is_dir(__DIR__ . '/Logs'));

        $this->assertTrue(file_exists(__DIR__ . '/Manager.php'));
    }
}