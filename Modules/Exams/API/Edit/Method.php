<?php

namespace Liloi\Rune\Modules\Exams\API\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Maps\Manager as MapsManager;
use Liloi\Rune\Modules\Exams\Domain\Crystals\Manager as OpponentsManager;
use Liloi\Rune\Modules\Exams\Domain\Crystals\Types as OpponentsTypes;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $keyMap = MapsManager::URLtoATOM($URL);
        $entity = OpponentsManager::load(self::getParameter('key_crystal'), $keyMap);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'types' => OpponentsTypes::$list
        ]));

        return $response;
    }
}