<?php

namespace Liloi\Rune\Modules\Wiki\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Judex\Assert;
use Liloi\Rune\Domain\Maps\Manager as AtomsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyMap = AtomsManager::URLtoATOM($_SERVER['REQUEST_URI']);

        $entity = AtomsManager::load($keyMap);
        $children = AtomsManager::loadFiles($keyMap);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'children' => $children,
            'entity' => $entity
        ]));
        return $response;
    }
}