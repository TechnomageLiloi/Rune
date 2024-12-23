<?php

namespace Liloi\Rune\Modules\Exams\API\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;
use Liloi\Rune\Modules\Exams\Domain\Opponents\Manager as OpponentsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $RID = DatabankManager::URLtoRID($URL);
        $entity = OpponentsManager::load(self::getParameter('key_opponent'), $RID);

        $text = '';
        if(self::getParameterExist('text'))
        {
            $text = self::getParameter('text');
        }

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'text' => $text
        ]));

        return $response;
    }
}