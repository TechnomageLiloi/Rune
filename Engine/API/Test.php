<?php

namespace Liloi\Rune\API;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(is_dir(__DIR__ . '/Security'));

        $this->assertTrue(file_exists(__DIR__ . '/Tree.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Method.php'));
    }
}