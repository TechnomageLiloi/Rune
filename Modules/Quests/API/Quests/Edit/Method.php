<?php

namespace Liloi\Rune\Modules\Quests\API\Quests\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Quests\Domain\Quests\Manager as QuestsManager;

/**
 * Rune API: Interstate60.Application.Quests.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $entity = QuestsManager::load(self::getParameter('key_quest'));

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity
        ]));

        return $response;
    }
}