<?php

namespace Liloi\Rune\Modules\Journal\Domain\Jobs;

use Liloi\Rune\Modules\Journal\Domain\Road\Entity as RoadEntity;
use PHPUnit\Framework\TestCase;
use Liloi\Rune\Helper;

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
        $this->assertTrue(file_exists(__DIR__ . '/Statuses.php'));
    }

    public function testEntity(): void
    {
        Helper::truncateDatabase();
        $key_day = random_int(0, 100);

        RoadEntity::create([
            'key_day' => $key_day,
            'program' => 'test-program',
            'goal' => 'test-goal'
        ]);

        $data = [
            'key_hour' => random_int(0, 100),
            'key_quarter' => random_int(0, 100),
            'key_day' => $key_day,
            'goal' => 'Enter the goal',
            'status' => Statuses::TODO,
            'xp' => random_int(-100, 100),
        ];

        $entity = Entity::create($data);

        $this->assertEquals($data['key_hour'], $entity->getHour());
        $this->assertEquals($data['key_quarter'], $entity->getQuarter());
        $this->assertEquals($data['key_day'], $entity->getKey());
        $this->assertEquals($data['goal'], $entity->getGoal());
        $this->assertEquals($data['status'], $entity->getStatus());
        $this->assertEquals($data['xp'], $entity->getXp());
    }
}