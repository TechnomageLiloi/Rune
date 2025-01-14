<?php

namespace Liloi\Rune\Modules\Exams\API\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;
use Liloi\Rune\Modules\Exams\Domain\Opponents\Manager as OpponentsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $RID = DatabankManager::URLtoRID($URL);
        $entity = OpponentsManager::load(self::getParameter('key_opponent'), $RID);

        $entity->setTitle(self::getParameter('title'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setTheory(self::getParameter('theory'));
        $entity->setType(self::getParameter('type'));
        $entity->setSpecie(self::getParameter('specie'));

        $entity->save();

        return new Response();
    }
}