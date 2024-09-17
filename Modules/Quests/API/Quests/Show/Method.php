<?php

namespace Liloi\Rune\Modules\Quests\API\Quests\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Quests\Domain\Quests\Manager as QuestsManager;
use Liloi\Rune\Modules\Quests\Domain\Tickets\Manager as TicketsManager;

/**
 * Rune API: Interstate60.Application.Quests.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $quest = QuestsManager::loadCurrent();

        $tickets = TicketsManager::loadCollection($quest->getKey());

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $quest,
            'tickets' => $tickets
        ]));

        return $response;
    }
}