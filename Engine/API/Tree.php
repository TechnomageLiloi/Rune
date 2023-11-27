<?php

namespace Liloi\Rune\API;

use Liloi\API\Manager;
use Liloi\API\Method;
use Liloi\Rune\API\Method as RuneMethod;

/**
 * @inheritDoc
 */
class Tree
{
    private static ?self $instance = null;

    private Manager $manager;

    private function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @obsolete It is centralized, which is incorrect.
     * @todo Add general API Pool.
     * @return static
     */
    public static function getInstance(): self
    {
        if(self::$instance === null)
        {
            $manager = new Manager();

            $manager->add(new Method('Rune.Atoms.Show', '\Liloi\Rune\API\Atoms\Show\Method::execute'));
            $manager->add(new Method('Rune.Atoms.Edit', '\Liloi\Rune\API\Atoms\Edit\Method::execute'));
            $manager->add(new Method('Rune.Atoms.Save', '\Liloi\Rune\API\Atoms\Save\Method::execute'));
            $manager->add(new Method('Rune.Atoms.Create', '\Liloi\Rune\API\Atoms\Create\Method::execute'));

            $manager->add(new Method('Rune.Atoms.RID.Edit', '\Liloi\Rune\API\Atoms\RID\Edit\Method::execute'));
            $manager->add(new Method('Rune.Atoms.RID.Save', '\Liloi\Rune\API\Atoms\RID\Save\Method::execute'));

            $manager->add(new Method('Rune.Security.Password.Show', '\Liloi\Rune\API\Security\Password\Show\Method::execute'));
            $manager->add(new Method('Rune.Security.Password.Check', '\Liloi\Rune\API\Security\Password\Check\Method::execute'));
            $manager->add(new Method('Rune.Security.Password.Logout', '\Liloi\Rune\API\Security\Password\Logout\Method::execute'));

            $manager->add(new Method('Rune.Plan.Show', '\Liloi\Rune\API\Plan\Show\Method::execute'));
            
            //

            $manager->add(new Method('Tardis.Application.Diary.Show', '\Liloi\Rune\API\Application\Diary\Show\Method::execute'));
            $manager->add(new Method('Tardis.Application.Diary.Edit', '\Liloi\Rune\API\Application\Diary\Edit\Method::execute'));
            $manager->add(new Method('Tardis.Application.Diary.Save', '\Liloi\Rune\API\Application\Diary\Save\Method::execute'));
            $manager->add(new Method('Tardis.Application.Diary.Create', '\Liloi\Rune\API\Application\Diary\Create\Method::execute'));

            $manager->add(new Method('Tardis.Degrees.Collection', '\Liloi\Rune\API\Degrees\Collection\Method::execute'));
            $manager->add(new Method('Tardis.Degrees.Show', '\Liloi\Rune\API\Degrees\Show\Method::execute'));
            $manager->add(new Method('Tardis.Degrees.Create', '\Liloi\Rune\API\Degrees\Create\Method::execute'));
            $manager->add(new Method('Tardis.Degrees.Remove', '\Liloi\Rune\API\Degrees\Remove\Method::execute'));
            $manager->add(new Method('Tardis.Degrees.Edit', '\Liloi\Rune\API\Degrees\Edit\Method::execute'));
            $manager->add(new Method('Tardis.Degrees.Save', '\Liloi\Rune\API\Degrees\Save\Method::execute'));

            $manager->add(new Method('Tardis.Lessons.Create', '\Liloi\Rune\API\Lessons\Create\Method::execute'));
            $manager->add(new Method('Tardis.Lessons.Edit', '\Liloi\Rune\API\Lessons\Edit\Method::execute'));
            $manager->add(new Method('Tardis.Lessons.Save', '\Liloi\Rune\API\Lessons\Save\Method::execute'));
            $manager->add(new Method('Tardis.Lessons.Remove', '\Liloi\Rune\API\Lessons\Remove\Method::execute'));
            $manager->add(new Method('Tardis.Lessons.Schedule', '\Liloi\Rune\API\Lessons\Schedule\Method::execute'));
            $manager->add(new Method('Tardis.Lessons.Timetable', '\Liloi\Rune\API\Lessons\Timetable\Method::execute'));
            $manager->add(new Method('Tardis.Lessons.Update', '\Liloi\Rune\API\Lessons\Update\Method::execute'));

            $manager->add(new Method('Tardis.Problems.Collection', '\Liloi\Rune\API\Problems\Collection\Method::execute'));
            $manager->add(new Method('Tardis.Problems.Create', '\Liloi\Rune\API\Problems\Create\Method::execute'));
            $manager->add(new Method('Tardis.Problems.Remove', '\Liloi\Rune\API\Problems\Remove\Method::execute'));
            $manager->add(new Method('Tardis.Problems.Edit', '\Liloi\Rune\API\Problems\Edit\Method::execute'));
            $manager->add(new Method('Tardis.Problems.Save', '\Liloi\Rune\API\Problems\Save\Method::execute'));
            $manager->add(new Method('Tardis.Problems.Show', '\Liloi\Rune\API\Problems\Show\Method::execute'));

            //

            $manager->add(new Method('Exams.Questions.Collection', '\Liloi\Rune\API\Exams\Questions\Collection\Method::execute'));
            $manager->add(new Method('Exams.Questions.Create', '\Liloi\Rune\API\Exams\Questions\Create\Method::execute'));
            $manager->add(new Method('Exams.Questions.Remove', '\Liloi\Rune\API\Exams\Questions\Remove\Method::execute'));
            $manager->add(new Method('Exams.Questions.Edit', '\Liloi\Rune\API\Exams\Questions\Edit\Method::execute'));
            $manager->add(new Method('Exams.Questions.Save', '\Liloi\Rune\API\Exams\Questions\Save\Method::execute'));
            $manager->add(new Method('Exams.Questions.Show', '\Liloi\Rune\API\Exams\Questions\Show\Method::execute'));
            $manager->add(new Method('Exams.Questions.Test', '\Liloi\Rune\API\Exams\Questions\Test\Method::execute'));
            $manager->add(new Method('Exams.Questions.Suite', '\Liloi\Rune\API\Exams\Questions\Suite\Method::execute'));

            //

            $manager->add(new Method('Stones.Projects.Collection', '\Liloi\Rune\API\Projects\Collection\Method::execute'));
            $manager->add(new Method('Stones.Projects.Show', '\Liloi\Rune\API\Projects\Show\Method::execute'));
            $manager->add(new Method('Stones.Projects.Edit', '\Liloi\Rune\API\Projects\Edit\Method::execute'));
            $manager->add(new Method('Stones.Projects.Save', '\Liloi\Rune\API\Projects\Save\Method::execute'));
            $manager->add(new Method('Stones.Projects.Create', '\Liloi\Rune\API\Projects\Create\Method::execute'));

            $manager->add(new Method('Stones.Tickets.Collection', '\Liloi\Rune\API\Tickets\Collection\Method::execute'));
            $manager->add(new Method('Stones.Tickets.Show', '\Liloi\Rune\API\Tickets\Show\Method::execute'));
            $manager->add(new Method('Stones.Tickets.Edit', '\Liloi\Rune\API\Tickets\Edit\Method::execute'));
            $manager->add(new Method('Stones.Tickets.Save', '\Liloi\Rune\API\Tickets\Save\Method::execute'));
            $manager->add(new Method('Stones.Tickets.Create', '\Liloi\Rune\API\Tickets\Create\Method::execute'));

            self::$instance = new self($manager);
        }

        return self::$instance;
    }

    public function execute(): string
    {
        if(strpos($_POST['method'], 'Rune.Security.') === false)
        {
            RuneMethod::accessCheck();
        }

        $response = $this->manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->asJson();
    }
}