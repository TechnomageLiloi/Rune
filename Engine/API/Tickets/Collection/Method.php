<?php

namespace Liloi\Rune\API\Tickets\Collection;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Domain\Tickets\Manager as TicketsManager;

/**
 * TARDIS API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $URL = $_SERVER['REQUEST_URI'];
        $keyAtom = AtomsManager::URLtoATOM($URL);
        $collection = TicketsManager::loadCollection($keyAtom);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection
        ]));

        return $response;
    }
}