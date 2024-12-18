<?php

namespace Liloi\Rune\Modules\Maps\API\Inventory\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Maps\Domain\Items\Manager as ItemsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $inventory = ItemsManager::loadInventory();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'inventory' => $inventory
        ]));

        return $response;
    }
}