<?php

namespace Liloi\Rune\API\Wiki\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Judex\Assert;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $accessAdmin = self::accessGet();

        $RID = AtomsManager::URLtoATOM($_SERVER['REQUEST_URI']);

        $entity = AtomsManager::load($RID);
        $children = AtomsManager::loadFiles($RID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'children' => $children,
            'entity' => $entity,
            'access' => $accessAdmin
        ]));
        return $response;
    }
}