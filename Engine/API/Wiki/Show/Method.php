<?php

namespace Liloi\Rune\API\Wiki\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Security;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $accessAdmin = self::accessGet();

        $URL = $_SERVER['REQUEST_URI'];

        $RID = AtomsManager::URLtoATOM($URL);

        $access = Security::check();

        $entity = AtomsManager::load($RID, !$access);
        $children = AtomsManager::loadFiles($RID, !$access);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'children' => $children,
            'entity' => $entity,
            'access' => $accessAdmin,
        ]));
        return $response;
    }
}