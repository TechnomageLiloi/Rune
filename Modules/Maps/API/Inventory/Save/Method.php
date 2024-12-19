<?php

namespace Liloi\Rune\Modules\Maps\API\Inventory\Save;

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
        $entity = ItemsManager::load(self::getParameter('key_item'));

        if(self::getParameterExist('type'))
        {
            $entity->setType(self::getParameter('type'));
        }

        if(self::getParameterExist('title'))
        {
            $entity->setTitle(self::getParameter('title'));
        }

        if(self::getParameterExist('description'))
        {
            $entity->setDescription(self::getParameter('description'));
        }

        if(self::getParameterExist('data'))
        {
            $entity->setData(self::getParameter('data'));
        }

        $entity->save();

        return new Response();
    }
}