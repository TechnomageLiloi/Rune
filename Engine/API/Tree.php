<?php

namespace Liloi\PoP\API;

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

            $manager->add(new Method('Rune.Atoms.Show', '\Liloi\PoP\API\Atoms\Show\Method::execute'));
            $manager->add(new Method('Rune.Atoms.Edit', '\Liloi\PoP\API\Atoms\Edit\Method::execute'));
            $manager->add(new Method('Rune.Atoms.Save', '\Liloi\PoP\API\Atoms\Save\Method::execute'));
            $manager->add(new Method('Rune.Atoms.Create', '\Liloi\PoP\API\Atoms\Create\Method::execute'));

            $manager->add(new Method('Rune.Atoms.RID.Edit', '\Liloi\PoP\API\Atoms\RID\Edit\Method::execute'));
            $manager->add(new Method('Rune.Atoms.RID.Save', '\Liloi\PoP\API\Atoms\RID\Save\Method::execute'));

            $manager->add(new Method('Rune.Security.Password.Show', '\Liloi\PoP\API\Security\Password\Show\Method::execute'));
            $manager->add(new Method('Rune.Security.Password.Check', '\Liloi\PoP\API\Security\Password\Check\Method::execute'));
            $manager->add(new Method('Rune.Security.Password.Logout', '\Liloi\PoP\API\Security\Password\Logout\Method::execute'));

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