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

            $manager->add(new Method('Exams.Questions.Collection', '\Liloi\Rune\API\Questions\Collection\Method::execute'));
            $manager->add(new Method('Exams.Questions.Create', '\Liloi\Rune\API\Questions\Create\Method::execute'));
            $manager->add(new Method('Exams.Questions.Remove', '\Liloi\Rune\API\Questions\Remove\Method::execute'));
            $manager->add(new Method('Exams.Questions.Edit', '\Liloi\Rune\API\Questions\Edit\Method::execute'));
            $manager->add(new Method('Exams.Questions.Save', '\Liloi\Rune\API\Questions\Save\Method::execute'));
            $manager->add(new Method('Exams.Questions.Show', '\Liloi\Rune\API\Questions\Show\Method::execute'));
            $manager->add(new Method('Exams.Questions.Test', '\Liloi\Rune\API\Questions\Test\Method::execute'));
            $manager->add(new Method('Exams.Questions.Suite', '\Liloi\Rune\API\Questions\Suite\Method::execute'));

            $manager->add(new Method('Rune.Atoms.Show', '\Liloi\Rune\API\Atoms\Show\Method::execute'));
            $manager->add(new Method('Rune.Atoms.Edit', '\Liloi\Rune\API\Atoms\Edit\Method::execute'));
            $manager->add(new Method('Rune.Atoms.Save', '\Liloi\Rune\API\Atoms\Save\Method::execute'));
            $manager->add(new Method('Rune.Atoms.Create', '\Liloi\Rune\API\Atoms\Create\Method::execute'));

            $manager->add(new Method('Rune.Atoms.RID.Edit', '\Liloi\Rune\API\Atoms\RID\Edit\Method::execute'));
            $manager->add(new Method('Rune.Atoms.RID.Save', '\Liloi\Rune\API\Atoms\RID\Save\Method::execute'));

            $manager->add(new Method('Rune.Security.Password.Show', '\Liloi\Rune\API\Security\Password\Show\Method::execute'));
            $manager->add(new Method('Rune.Security.Password.Check', '\Liloi\Rune\API\Security\Password\Check\Method::execute'));
            $manager->add(new Method('Rune.Security.Password.Logout', '\Liloi\Rune\API\Security\Password\Logout\Method::execute'));

            self::$instance = new self($manager);
        }

        return self::$instance;
    }

    public function execute(): string
    {
        // @todo: optimize

//        if(strpos($_POST['method'], 'Rune.User.') !== false)
//        {
//            return $this->manager->search($_POST['method'])->execute($_POST['parameters'] ?? [])->asJson();
//        }
//
//        if(strpos($_POST['method'], 'Rune.Security.') === false)
//        {
//            RuneMethod::accessCheck();
//        }

        // @todo: add dynamic API search (by namespace).
        $response = $this->manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->asJson();
    }

    /**
     * Get API manager.
     *
     * @return Manager
     */
    public function getManager(): Manager
    {
        return $this->manager;
    }
}