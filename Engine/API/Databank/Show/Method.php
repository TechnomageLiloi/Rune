<?php

namespace Liloi\Rune\API\Databank\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $URL = $_SERVER['REQUEST_URI'];

        $RID = DatabankManager::URLtoRID($URL);

        $entity = DatabankManager::load($RID);
        $children = DatabankManager::loadFiles($RID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'children' => $children,
            'entity' => $entity,
        ]));
        return $response;
    }
}