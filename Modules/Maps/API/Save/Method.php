<?php

namespace Liloi\Rune\Modules\Maps\API\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $RID = DatabankManager::URLtoRID($URL);

        $entity = DatabankManager::load($RID);

        if(self::getParameter('key') === 'map')
        {
            $entity->setMap(implode("\n", self::getParameter('value')));
        }

        $entity->save();

        return new Response();
    }
}