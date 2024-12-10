<?php

namespace Liloi\Rune\API\Databank\Search;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $likeRID = self::getParameter('rid');

        $collection = DatabankManager::search($likeRID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection,
        ]));
        return $response;
    }
}