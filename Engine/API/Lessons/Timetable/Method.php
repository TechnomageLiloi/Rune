<?php

namespace Liloi\Rune\API\Lessons\Timetable;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Lessons\Manager;
use Liloi\Rune\Domain\Lessons\Status;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $collection = Manager::loadTimetable();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection,
            'statuses' => Status::$list
        ]));

        return $response;
    }
}