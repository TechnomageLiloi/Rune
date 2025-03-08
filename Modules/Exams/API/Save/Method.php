<?php

namespace Liloi\Rune\Modules\Exams\API\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Maps\Manager as MapsManager;
use Liloi\Rune\Modules\Exams\Domain\Quests\Manager as OpponentsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $RID = MapsManager::URLtoATOM($URL);
        $entity = OpponentsManager::load(self::getParameter('key_quest'), $RID);

        $entity->setTitle(self::getParameter('title'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setDialog(self::getParameter('dialog'));
        $entity->setType(self::getParameter('type'));

        $entity->save();

        return new Response();
    }
}