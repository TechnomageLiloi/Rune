<?php

namespace Liloi\Rune\Modules\News\API\Topics\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\News\Domain\Topics\Manager as TopicsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $entity = TopicsManager::load(self::getParameter('key_topic'));

        $entity->setTitle(self::getParameter('title'));
        $entity->setSummary(self::getParameter('summary'));
        $entity->setTags(self::getParameter('tags'));
        $entity->setDt(self::getParameter('dt'));
        $entity->setData(self::getParameter('data'));
        $entity->setStatus(self::getParameter('status'));

        $entity->save();

        return new Response();
    }
}