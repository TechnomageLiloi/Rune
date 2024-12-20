<?php

namespace Liloi\Rune\Modules\Maps\API\Inventory\Put;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Maps\Domain\Items\Manager as ItemsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $item = ItemsManager::load(self::getParameter('key_item'));
        $item->put(self::getParameter('x'), self::getParameter('y'));

        return new Response();
    }
}