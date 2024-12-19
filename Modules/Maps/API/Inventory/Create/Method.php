<?php

namespace Liloi\Rune\Modules\Maps\API\Inventory\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Maps\Domain\Items\Manager as ItemsManager;

/**
 * Rune API: Interstate60.Application.Quests.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        ItemsManager::create();

        return new Response();
    }
}