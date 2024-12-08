<?php

namespace Liloi\Rune\Modules\Journal\API\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;

/**
 * Rune API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [

        ]));

        return $response;
    }
}