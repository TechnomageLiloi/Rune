<?php

namespace Liloi\Rune\Modules\Journal\API\Road\Edit;

use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(file_exists(__DIR__ . '/Method.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Style.less'));
        $this->assertTrue(file_exists(__DIR__ . '/Style.css'));
        $this->assertTrue(file_exists(__DIR__ . '/Template.tpl'));
    }
}