<?php

namespace Liloi\Rune\Modules\Levels\API\Tickets\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Levels\Domain\Tickets\Manager as TicketsManager;

/**
 * Rune API: Interstate60.Application.Quests.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyQuest = self::getParameter('key_quest');
        TicketsManager::create($keyQuest);
        return new Response();
    }
}