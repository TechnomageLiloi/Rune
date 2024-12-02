<?php

namespace Liloi\Rune\Domain\Config;

use PHPUnit\Framework\TestCase;
use Liloi\Rune\Helper;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(file_exists(__DIR__ . '/Entity.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Keys.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Manager.php'));
    }

    public function testCheckSaveLoad(): void
    {
        Helper::defineConfig();

        $config = Manager::load('test');

        $this->assertEquals('test', $config->getKey());
        $config->setString('test-a');

        $config->save();

        $configSave = Manager::load('test');

        $this->assertEquals('test', $configSave->getKey());
        $this->assertEquals('test-a', $configSave->getString());
    }
}