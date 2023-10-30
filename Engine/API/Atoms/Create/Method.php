<?php

namespace Liloi\PoP\API\Atoms\Create;

use Liloi\API\Response;
use Liloi\PoP\API\Method as SuperMethod;
use Liloi\PoP\Domain\Atoms\Manager as AtomsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $URL = $_SERVER['REQUEST_URI'];
        $ridSuper = AtomsManager::URLtoATOM($URL);
        AtomsManager::create($ridSuper);
        return new Response();
    }
}