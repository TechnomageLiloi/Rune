<?php

namespace Liloi\Rune\Modules\Exams\API\Crystals\Create;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(file_exists(__DIR__ . '/Method.php'));;
    }
}