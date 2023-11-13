<?php

namespace Liloi\Rune\API\Tickets\Collection;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Tickets\Manager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyProject = self::getParameter('key_project');
        $collection = Manager::loadCollection($keyProject);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection,
            'keyProject' => $keyProject
        ]));

        return $response;
    }
}