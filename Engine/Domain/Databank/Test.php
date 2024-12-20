<?php

namespace Liloi\Rune\Domain\Databank;

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
        $this->assertTrue(file_exists(__DIR__ . '/Collection.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Manager.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Statuses.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Types.php'));
        $this->assertTrue(file_exists(__DIR__ . '/Statuses.php'));
    }

    public function testCheckEntity(): void
    {
        Helper::defineConfig();

        $config = Manager::load('test');

        $data = [
            'rid' => 'test:test',
            'status' => Statuses::CLOSED,
            'type' => Types::NEMO,
            'title' => 'test',
            'summary' => 'test',
            'map' => 'test',
            'data' => '{}'
        ];

        $entity = Entity::create($data);

        $this->assertEquals($data['rid'], $entity->getKey());
        $this->assertEquals($data['status'], $entity->getStatus());
        $this->assertEquals($data['type'], $entity->getType());
        $this->assertEquals($data['title'], $entity->getTitle());
        $this->assertEquals($data['summary'], $entity->getSummary());
        $this->assertEquals($data['map'], $entity->getMap());
        $this->assertEquals($data['data'], $entity->getData());
    }
}