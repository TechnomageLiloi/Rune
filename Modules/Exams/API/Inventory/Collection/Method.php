<?php

namespace Liloi\Rune\Modules\Exams\API\Inventory\Collection;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Modules\Exams\Domain\Inventory\Manager as InventoryManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $URL = $_SERVER['REQUEST_URI'];
        $RID = AtomsManager::URLtoATOM($URL);
        $collection = InventoryManager::loadCollection($RID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection
        ]));

        return $response;
    }
}