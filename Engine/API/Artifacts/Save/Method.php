<?php

namespace Liloi\Rune\API\Artifacts\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Artifacts\Manager as TicketsManager;

/**
 * Rune API: Interstate60.Application.Diary.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $entity = TicketsManager::load(self::getParameter('key_artifact'));

        $entity->setType(self::getParameter('type'));
        $entity->setTitle(self::getParameter('title'));
        $entity->setDescription(self::getParameter('description'));
        $entity->setGlobal(self::getParameter('global'));
        $entity->setLocal(self::getParameter('local'));
        $entity->setData(self::getParameter('data'));

        $entity->save();

        return new Response();
    }
}