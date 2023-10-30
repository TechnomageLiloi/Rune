<?php

namespace Liloi\PoP\API\Atoms\Show;

use Liloi\API\Response;
use Liloi\PoP\API\Method as SuperMethod;
use Liloi\PoP\Domain\Atoms\Manager as AtomsManager;
use Liloi\PoP\Security;
use Liloi\PoP\Exceptions\AccessException;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $keyAtom = AtomsManager::URLtoATOM($URL);
        $entity = AtomsManager::load($keyAtom);

        $isAdmin = self::accessGet();

        if(!$entity->isPublished() && !$isAdmin)
        {
            throw new AccessException();
        }

        $children = AtomsManager::loadFiles($keyAtom, !$isAdmin);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'children' => $children,
            'entity' => $entity,
            'admin' => Security::check()
        ]));
        return $response;
    }
}