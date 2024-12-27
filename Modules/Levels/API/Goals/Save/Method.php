<?php

namespace Liloi\Rune\Modules\Levels\API\Goals\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Levels\Domain\Goals\Manager as TicketsManager;
use Liloi\Rune\Modules\Levels\Domain\Quests\Manager as QuestsManager;

/**
 * Rune API: Interstate60.Application.Quests.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $road = QuestsManager::loadCurrent();
        $entity = TicketsManager::load($road->getKey(), self::getParameter('key_ticket'));

        $entity->setTitle(self::getParameter('title'));

        $entity->save();

        return new Response();
    }
}