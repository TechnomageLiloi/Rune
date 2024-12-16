<?php

namespace Liloi\Rune\Modules\Teacher\API\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Teacher\Domain\Teacher\Manager as TeacherManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        TeacherManager::create(
            self::getParameter('teacher'),
            self::getParameter('dialog')
        );

        return new Response();
    }
}