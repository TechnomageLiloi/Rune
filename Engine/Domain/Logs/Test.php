<?php

namespace Liloi\Rune\Domain\Logs;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(file_exists(__DIR__ . '/Entity.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Collection.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Manager.php'));
    }
}