<?php

namespace Liloi\Rune\Modules\Maps\API\Inventory\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Maps\Domain\Items\Manager as ItemsManager;
use Liloi\Rune\Modules\Maps\Domain\Items\Types as ItemsTypes;

/**
 * Rune API: Interstate60.Application.Quests.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = ItemsManager::load(self::getParameter('key_item'));

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'types' => ItemsTypes::$list
        ]));

        return $response;
    }
}