<?php

namespace Liloi\Rune\API\Wiki\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $accessAdmin = self::accessGet();

        $URL = $_SERVER['REQUEST_URI'];

        $RID = AtomsManager::URLtoATOM($URL);

        $entity = AtomsManager::load($RID, true);
        $children = AtomsManager::loadFiles($RID, true);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'children' => $children,
            'entity' => $entity,
            'access' => $accessAdmin,
        ]));
        return $response;
    }
}