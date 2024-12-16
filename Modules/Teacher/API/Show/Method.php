<?php

namespace Liloi\Rune\Modules\Teacher\API\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Teacher\Domain\Teacher\Manager as TeacherManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection = TeacherManager::loadCollection();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection
        ]));

        return $response;
    }
}