<?php

namespace Liloi\Rune\Modules\Maps\API\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $RID = AtomsManager::URLtoATOM($URL);

        $entity = AtomsManager::load($RID);
        $entity->setDataElement(self::getParameter('key'), self::getParameter('value'));
        $entity->save();

        return new Response();
    }
}