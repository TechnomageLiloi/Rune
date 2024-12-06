<?php

namespace Liloi\Rune\Services;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(file_exists(__DIR__ . '/Cache.php'));
    }
}