<?php

namespace Liloi\Rune\API\Databank\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $RID = self::getParameter('rid');
        $entity = DatabankManager::load($RID);

        $entity->setTitle(self::getParameter('title'));
        $entity->setType(self::getParameter('type'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setSummary(self::getParameter('summary'));
        $entity->setTags(self::getParameter('tags'));
        $entity->setTs(self::getParameter('ts'));

        $entity->save();

        return new Response();
    }
}