<?php

namespace Liloi\Rune\Modules\Databank\Domain\Scrolls;

use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Helper;
use Liloi\Rune\Security;
use PHPUnit\Framework\TestCase;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(file_exists(__DIR__ . '/Collection.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Entity.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Manager.php'));
    }

    public function testCheckSaveLoad(): void
    {
        Helper::defineConfig();
        Helper::truncateDatabase();
        Security::login();
        AtomsManager::load('rune');

        $this->assertEquals(0, Helper::one('select count(*) from rune_scroll;'));
        $scroll = Manager::create('rune');
        $this->assertEquals(0, Helper::one('select count(*) from rune_scroll;'));

        $this->assertTrue($scroll instanceof Entity);

        $scroll->setTitle('Test!');
        $scroll->save();

        $scrollNew = Manager::load($scroll->getKey());
        $this->assertEquals('Test!', $scrollNew->getTitle());
    }
}