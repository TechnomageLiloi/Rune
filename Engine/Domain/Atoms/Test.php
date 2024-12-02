<?php

namespace Liloi\Rune\Domain\Atoms;

use PHPUnit\Framework\TestCase;
use Liloi\Rune\Helper;
use Liloi\Rune\Security;

/**
 * Check phpUnit testing ability.
 */
class Test extends TestCase
{
    public function testCheckFileExistence(): void
    {
        $this->assertTrue(file_exists(__DIR__ . '/Collection.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Entity.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Statuses.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Types.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Manager.php'));
    }

    public function testCheckSaveLoad(): void
    {
        Helper::defineConfig();
        Helper::truncateDatabase();
        Security::login();
        $RID = 'rune';

        $this->assertEquals(0, Helper::one('select count(*) from rune_atoms;'));
        $entity = Manager::load($RID);
        $this->assertEquals(1, Helper::one('select count(*) from rune_atoms;'));
    }
}