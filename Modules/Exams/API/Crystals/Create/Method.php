<?php

namespace Liloi\Rune\Modules\Exams\API\Crystals\Create;

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

        $data = json_decode(self::getParameter('data'), true, JSON_UNESCAPED_UNICODE);

        CrystalsManager::create(
            self::getParameter('key_crystal'),
            $keyMap,
            $data
        );

        return new Response();
    }
}