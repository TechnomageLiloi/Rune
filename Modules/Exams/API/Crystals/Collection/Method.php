<?php

namespace Liloi\Rune\Modules\Exams\API\Crystals\Collection;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Modules\Exams\Domain\Crystals\Manager as CrystalsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $key_item = self::getParameter('key_item');
        $collection = CrystalsManager::loadCollection($key_item);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection,
            'key_item' => $key_item
        ]));

        return $response;
    }
}