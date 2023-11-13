<?php

namespace Liloi\Rune\API\Tickets\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Tickets\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = Manager::load(self::getParameter('key'));

        $entity->setTitle(self::getParameter('title'));
        $entity->setDt(self::getParameter('dt'));
        $entity->setData(self::getParameter('data'));

        $entity->save();

        return new Response();
    }
}