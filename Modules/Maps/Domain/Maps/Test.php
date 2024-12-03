<?php

namespace Liloi\Rune\Modules\Maps\Domain\Maps;

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

        $this->assertEquals(0, Helper::one('select count(*) from rune_maps;'));
        $map = Manager::create('test');
        $this->assertEquals(1, Helper::one('select count(*) from rune_maps;'));

        $this->assertTrue($map instanceof Entity);
        $map->setTitle('Test!');
        $map->setMap('...');
        $map->save();

        $scrollNew = Manager::load($map->getKey());
        $this->assertEquals('Test!', $scrollNew->getTitle());
        $this->assertEquals('...', $scrollNew->getMap());
    }
}