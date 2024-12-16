<?php

namespace Liloi\Rune\Modules\Maps;

use PHPUnit\Framework\TestCase;

/**
 * Class: Modules:Maps
 */
class Test extends TestCase
{
    /**
     * * Arrange: define directories paths.
     * * Act: check existence.
     * * Assert: all directories must exist.
     */
    public function testCheckDirExistence(): void
    {
        $this->assertTrue(is_dir(__DIR__ . '/Domain'));
        $this->assertTrue(is_dir(__DIR__ . '/API'));
    }
}