<?php

namespace Liloi\Rune\Modules\Exams\API\Crystals\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Exams\Domain\Crystals\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $key_crystal = self::getParameter('key_crystal');
        $entity = Manager::load($key_crystal);

        $entity->setTitle(self::getParameter('title'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setType(self::getParameter('type'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setTheory(self::getParameter('theory'));
        $entity->setTags(self::getParameter('tags'));
        $entity->setDt(self::getParameter('dt'));

        $entity->save();

        return new Response();
    }
}