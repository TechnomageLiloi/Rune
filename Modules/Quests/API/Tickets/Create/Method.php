<?php

namespace Liloi\Rune\Modules\Quests\API\Tickets\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Quests\Domain\Quests\Manager as QuestsManager;
use Liloi\Rune\Modules\Quests\Domain\Tickets\Manager as TicketsManager;

/**
 * Rune API: Interstate60.Application.Quests.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $quest = QuestsManager::loadCurrent();
        TicketsManager::create($quest->getKey());
        return new Response();
    }
}