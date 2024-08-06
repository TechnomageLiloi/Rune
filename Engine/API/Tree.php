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

            $manager->add(new Method('Rune.Teacher.Show', '\Liloi\Rune\API\Teacher\Show\Method::execute'));
            $manager->add(new Method('Rune.Teacher.Save', '\Liloi\Rune\API\Teacher\Save\Method::execute'));

            $manager->add(new Method('Rune.Atoms.Edit', '\Liloi\Rune\API\Atoms\Edit\Method::execute'));
            $manager->add(new Method('Rune.Atoms.Save', '\Liloi\Rune\API\Atoms\Save\Method::execute'));

            $manager->add(new Method('Rune.Wiki.Show', '\Liloi\Rune\API\Wiki\Show\Method::execute'));

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