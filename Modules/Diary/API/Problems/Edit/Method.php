<?php

namespace Liloi\Rune\Modules\Diary\API\Problems\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Diary\Domain\Problems\Manager as ProblemsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $entity = ProblemsManager::load(self::getParameter('key_problem'));

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity
        ]));

        return $response;
    }
}