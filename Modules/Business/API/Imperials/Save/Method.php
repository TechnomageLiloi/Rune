<?php

namespace Liloi\Rune\Modules\Business\API\Imperials\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Business\Domain\Imperials\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = Manager::load(self::getParameter('key'));

        $entity->setTitle(self::getParameter('title'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setCredits(self::getParameter('credits'));

        $entity->save();

        return new Response();
    }
}