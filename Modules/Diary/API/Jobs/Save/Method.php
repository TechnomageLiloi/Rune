<?php

namespace Liloi\Rune\Modules\Diary\API\Jobs\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Diary\Domain\Jobs\Manager as DiaryManager;
use Liloi\Rune\Modules\Diary\Domain\Road\Manager as RoadManager;

/**
 * Rune API: Interstate60.Application.Diary.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $road = RoadManager::loadCurrent();
        $entity = DiaryManager::load($road->getKey(), self::getParameter('key_job'));

        $entity->setTitle(self::getParameter('title'));
        $entity->setType(self::getParameter('type'));
        $entity->setStatus(self::getParameter('status'));

        $entity->save();

        return new Response();
    }
}