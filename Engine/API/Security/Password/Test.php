<?php

namespace Liloi\Rune\API\Security\Password;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(is_dir(__DIR__ . '/Check'));
        $this->assertTrue(is_dir(__DIR__ . '/Logout'));
        $this->assertTrue(is_dir(__DIR__ . '/Show'));
    }
}