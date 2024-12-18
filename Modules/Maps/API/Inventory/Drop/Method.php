<?php

namespace Liloi\Rune\Modules\Maps\API\Inventory\Drop;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;
use Liloi\Rune\Modules\Maps\Domain\Items\Manager as ItemsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $RID = DatabankManager::URLtoRID($URL);

        $item = ItemsManager::load(self::getParameter('key_item'));
        $item->drop($RID, self::getParameter('x'), self::getParameter('y'));

        return new Response();
    }
}