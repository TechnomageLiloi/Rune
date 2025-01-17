<?php

namespace Liloi\Rune\Modules\Exams\API\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;
use Liloi\Rune\Modules\Exams\Domain\Opponents\Manager as OpponentsManager;
use Liloi\Rune\Modules\Exams\Domain\Opponents\Types as OpponentsTypes;
use Liloi\Rune\Modules\Exams\Domain\Opponents\Species as OpponentsSpecies;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $RID = DatabankManager::URLtoRID($URL);
        $entity = OpponentsManager::load(self::getParameter('key_opponent'), $RID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'types' => OpponentsTypes::$list,
            'species' => OpponentsSpecies::$list,
        ]));

        return $response;
    }
}