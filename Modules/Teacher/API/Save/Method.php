<?php

namespace Liloi\Rune\Modules\Teacher\API\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Teacher\Domain\Teacher\Manager as TeacherManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = TeacherManager::load(self::getParameter('key_dialog'));

        $entity->setTeacher(self::getParameter('teacher'));
        $entity->setDialog(self::getParameter('dialog'));

        $entity->save();

        return new Response();
    }
}