<?php

namespace Liloi\Rune\Modules\Levels\API\Tickets\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Levels\Domain\Tickets\Manager as TicketsManager;

/**
 * Rune API: Interstate60.Application.Quests.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyQuest = self::getParameter('key_quest');
        $entity = TicketsManager::load($keyQuest, self::getParameter('key_ticket'));

        $entity->setTitle(self::getParameter('title'));
        $entity->setStatus(self::getParameter('status'));

        $entity->save();

        return new Response();
    }
}