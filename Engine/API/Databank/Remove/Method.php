<?php

namespace Liloi\Rune\API\Databank\Remove;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $RID = self::getParameter('rid');
        $entity = DatabankManager::load($RID);
        $entity->remove();

        return new Response();
    }
}