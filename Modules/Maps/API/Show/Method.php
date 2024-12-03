<?php

namespace Liloi\Rune\Modules\Maps\API\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $RID = AtomsManager::URLtoATOM($URL);
        $entity = AtomsManager::load($RID);

        // @todo: use map manager instead atom.

        $map = new Map($entity);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'map' => $map->load()
        ]));

        return $response;
    }
}