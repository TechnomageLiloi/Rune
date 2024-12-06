<?php

namespace Liloi\Rune;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(is_dir(__DIR__ . '/API'));
        $this->assertTrue(is_dir(__DIR__ . '/Domain'));
        $this->assertTrue(is_dir(__DIR__ . '/Exceptions'));
        $this->assertTrue(is_dir(__DIR__ . '/Services'));

        $this->assertTrue(file_exists(__DIR__ . '/Application.php'));
    }
}