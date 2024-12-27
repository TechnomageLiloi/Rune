<?php

namespace Liloi\Rune\Modules\Levels\API\Goals\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Levels\Domain\Quests\Manager as QuestsManager;
use Liloi\Rune\Modules\Levels\Domain\Goals\Manager as TicketsManager;

/**
 * Rune API: Interstate60.Application.Quests.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $quest = QuestsManager::loadCurrent();
        TicketsManager::create($quest->getKey());
        return new Response();
    }
}