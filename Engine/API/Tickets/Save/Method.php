<?php

namespace Liloi\Rune\API\Tickets\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Tickets\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Save
 * @package Liloi\Blueprint\API\Blueprints\Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $keyTicket = self::getParameter('key_ticket');
        $entity = Manager::load($keyTicket);

        $entity->setTitle(self::getParameter('title'));
        $entity->setPower(self::getParameter('power'));
        $entity->setStart(self::getParameter('start'));
        $entity->setFinish(self::getParameter('finish'));
        $entity->setStatus(self::getParameter('status'));

        $entity->save();

        return new Response();
    }
}