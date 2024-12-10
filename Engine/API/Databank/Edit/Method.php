<?php

namespace Liloi\Rune\API\Databank\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;
use Liloi\Rune\Domain\Databank\Statuses as DatabankStatuses;
use Liloi\Rune\Domain\Databank\Types as DatabankTypes;

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
        $RID = DatabankManager::URLtoRID($URL);

        $entity = DatabankManager::load($RID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => DatabankStatuses::$list,
            'types' => DatabankTypes::$list,
        ]));

        return $response;
    }
}