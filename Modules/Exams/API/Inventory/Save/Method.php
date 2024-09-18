<?php

namespace Liloi\Rune\Modules\Exams\API\Inventory\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Exams\Domain\Inventory\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $key_item = self::getParameter('key_item');
        $entity = Manager::load($key_item);

        $entity->setKeyAtom(self::getParameter('key_atom'));
        $entity->setTitle(self::getParameter('title'));
        $entity->setType(self::getParameter('type'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setDt(self::getParameter('dt'));

        $entity->save();

        return new Response();
    }
}