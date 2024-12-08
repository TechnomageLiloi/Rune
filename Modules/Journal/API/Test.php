<?php

namespace Liloi\Rune\Modules\Journal\API;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(is_dir(__DIR__ . '/Jobs'));
        $this->assertTrue(is_dir(__DIR__ . '/Show'));
    }
}