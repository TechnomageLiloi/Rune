<?php

namespace Liloi\Rune\Modules\Quests\API\Quests\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Quests\Domain\Quests\Manager as QuestsManager;

/**
 * Rune API: Interstate60.Application.Quests.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $entity = QuestsManager::load(self::getParameter('key_quest'));

        $entity->setData(self::getParameter('data'));
        $entity->setSummary(self::getParameter('summary'));

        $entity->save();

        return new Response();
    }
}