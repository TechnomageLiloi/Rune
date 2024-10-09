<?php

namespace Liloi\Rune\Modules\Degrees\API\Degrees\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Degrees\Domain\Degrees\Manager;
use Liloi\Rune\Modules\Degrees\Domain\Degrees\Statuses;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = Manager::load(self::getParameter('key'));
        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => Statuses::$list,
        ]));

        return $response;
    }
}