<?php

namespace Liloi\Rune\Modules\Exams\API\Crystals\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;

use Liloi\Rune\Modules\Exams\Domain\Crystals\Manager;
use Liloi\Rune\Modules\Exams\Domain\Crystals\Statuses;
use Liloi\Rune\Modules\Exams\Domain\Crystals\Types;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $key_crystal = self::getParameter('key_crystal');
        $entity = Manager::load($key_crystal);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => Statuses::$list,
            'types' => Types::$list,
        ]));

        return $response;
    }
}