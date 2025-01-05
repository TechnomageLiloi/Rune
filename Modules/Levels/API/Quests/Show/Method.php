<?php

namespace Liloi\Rune\Modules\Levels\API\Quests\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Levels\Domain\Quests\Manager as QuestsManager;
use Liloi\Rune\Modules\Levels\Domain\Tickets\Manager as TicketsManager;

/**
 * Rune API: Interstate60.Application.Quests.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $status = self::getParameter('status');
        $quests = QuestsManager::loadCollection($status);

        $tickets = TicketsManager::loadGroup($quests->getKeys());

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'quests' => $quests,
            'tickets' => $tickets,
            'status' => $status
        ]));

        return $response;
    }
}