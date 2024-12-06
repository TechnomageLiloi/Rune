<?php

namespace Liloi\Rune\API\Security;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(is_dir(__DIR__ . '/Error'));
        $this->assertTrue(is_dir(__DIR__ . '/Password'));
    }
}