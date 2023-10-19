<?php

namespace Liloi\Rune\API;

use Liloi\API\Manager;
use Liloi\API\Method;

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

    public static function getInstance(): self
    {
        if(self::$instance === null)
        {
            $manager = new Manager();

            $manager->add(new Method('Rune.Dashboard.Show', '\Liloi\Rune\API\Dashboard\Show\Method::execute'));
            $manager->add(new Method('Rune.Dashboard.Frame', '\Liloi\Rune\API\Dashboard\Frame\Method::execute'));

            $manager->add(new Method('Rune.Security.Password.Show', '\Liloi\Rune\API\Security\Password\Show\Method::execute'));
            $manager->add(new Method('Rune.Security.Password.Check', '\Liloi\Rune\API\Security\Password\Check\Method::execute'));
            $manager->add(new Method('Rune.Security.Password.Logout', '\Liloi\Rune\API\Security\Password\Logout\Method::execute'));

            self::$instance = new self($manager);
        }

        return self::$instance;
    }

    public function execute(): string
    {
        $response = $this->manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->asJson();
    }
}