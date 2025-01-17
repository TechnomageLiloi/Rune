<?php

namespace Liloi\Rune\Modules\Levels\API\Tickets\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Levels\Domain\Tickets\Manager as TicketsManager;
use Liloi\Rune\Modules\Levels\Domain\Tickets\Statuses as TicketsStatuses;
use Liloi\Rune\Modules\Levels\Domain\Quests\Manager as QuestsManager;

/**
 * Rune API: Interstate60.Application.Quests.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyQuest = self::getParameter('key_quest');

        $entity = TicketsManager::load($keyQuest, self::getParameter('key_ticket'));
        $quest = QuestsManager::load($keyQuest);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'quest' => $quest,
            'statuses' => TicketsStatuses::$list
        ]));

        return $response;
    }
}