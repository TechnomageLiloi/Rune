<?php

namespace Liloi\Rune\Modules\Exams\API\Crystals\Search;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Exams\Domain\Crystals\Manager as CrystalsManager;
use Liloi\Rune\Domain\Maps\Manager as MapsManager;

/**
 * Rune API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $keyMap = MapsManager::URLtoATOM($URL);

        $crystals = CrystalsManager::loadCollection(self::getParameter('key_quest'), $keyMap);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'crystals' => $crystals
        ]));

        return $response;
    }
}