<?php

namespace Liloi\Rune\API\Atoms\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Exceptions\AccessException;

/**
 * API: Rune.Atoms.Create
 */
class Method extends SuperMethod
{
    /**
     * @return Response
     * @throws AccessException
     */
    public static function execute(): Response
    {


        $URL = $_SERVER['REQUEST_URI'];
        $ridSuper = AtomsManager::URLtoATOM($URL);
        AtomsManager::create($ridSuper);
        return new Response();
    }
}