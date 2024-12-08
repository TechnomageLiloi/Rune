<?php

namespace Liloi\Rune\Modules\Journal\API\Road\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Journal\Domain\Road\Manager as RoadManager;

/**
 * Rune API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $day = RoadManager::load(self::getParameter('key_day'));

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'day' => $day
        ]));

        return $response;
    }
}