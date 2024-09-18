<?php

namespace Liloi\Rune\Modules\Exams\API\Inventory\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;

use Liloi\Rune\Modules\Exams\Domain\Inventory\Manager;
use Liloi\Rune\Modules\Exams\Domain\Inventory\Types;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $key_item = self::getParameter('key_item');
        $entity = Manager::load($key_item);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'types' => Types::$list,
        ]));

        return $response;
    }
}