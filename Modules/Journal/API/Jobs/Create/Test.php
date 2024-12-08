<?php

namespace Liloi\Rune\Modules\Journal\API\Jobs\Create;

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