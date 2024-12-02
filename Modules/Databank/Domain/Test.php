<?php

namespace Liloi\Rune\Modules\Databank\Domain;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckExistence(): void
    {
        $this->assertTrue(is_dir(__DIR__));
    }
}