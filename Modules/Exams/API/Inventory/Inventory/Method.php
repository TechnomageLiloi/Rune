<?php

namespace Liloi\Rune\Modules\Exams\API\Inventory\Inventory;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Business\Domain\Imperials\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $activeImperials = Manager::loadCollectionActive();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'imperials' => $activeImperials
        ]));

        return $response;
    }
}