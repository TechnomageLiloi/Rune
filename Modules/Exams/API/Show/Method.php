<?php

namespace Liloi\Rune\Modules\Exams\API\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Maps\Manager as MapsManager;
use Liloi\Rune\Modules\Exams\Domain\Quests\Manager as OpponentsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $RID = MapsManager::URLtoATOM($URL);

        $entity = OpponentsManager::load(self::getParameter('key_quest'), $RID);

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