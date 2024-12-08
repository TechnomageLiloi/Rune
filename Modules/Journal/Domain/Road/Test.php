<?php

namespace Liloi\Rune\Modules\Journal\Domain\Road;

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

    public function testEntity(): void
    {
        $data = [
            'key_day' => random_int(0, 100),
            'program' => 'test-program',
            'goal' => 'test-goal'
        ];

        $entity = Entity::create($data);

        $this->assertEquals($data['key_day'], $entity->getKey());
        $this->assertEquals($data['program'], $entity->getProgram());
        $this->assertEquals('<p>' . $data['program'] . '</p>', $entity->getProgramParse());
        $this->assertEquals($data['goal'], $entity->getGoal());
    }
}