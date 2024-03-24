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

            $manager->add(new Method('Exams.Report.Collection', '\Liloi\Rune\API\Report\Collection\Method::execute'));
            $manager->add(new Method('Exams.Report.Create', '\Liloi\Rune\API\Report\Create\Method::execute'));

            $manager->add(new Method('Rune.Suites.Edit', '\Liloi\Rune\API\Suites\Edit\Method::execute'));
            $manager->add(new Method('Rune.Suites.Save', '\Liloi\Rune\API\Suites\Save\Method::execute'));

            $manager->add(new Method('Exams.Questions.Collection', '\Liloi\Rune\API\Questions\Collection\Method::execute'));
            $manager->add(new Method('Exams.Questions.Create', '\Liloi\Rune\API\Questions\Create\Method::execute'));
            $manager->add(new Method('Exams.Questions.Remove', '\Liloi\Rune\API\Questions\Remove\Method::execute'));
            $manager->add(new Method('Exams.Questions.Edit', '\Liloi\Rune\API\Questions\Edit\Method::execute'));
            $manager->add(new Method('Exams.Questions.Save', '\Liloi\Rune\API\Questions\Save\Method::execute'));
            $manager->add(new Method('Exams.Questions.Show', '\Liloi\Rune\API\Questions\Show\Method::execute'));
            $manager->add(new Method('Exams.Questions.Test', '\Liloi\Rune\API\Questions\Test\Method::execute'));
            $manager->add(new Method('Exams.Questions.Suite', '\Liloi\Rune\API\Questions\Suite\Method::execute'));

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