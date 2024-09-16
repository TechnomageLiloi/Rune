<?php

namespace Liloi\Rune\Modules\Diary\API\Jobs\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Diary\Domain\Jobs\Manager as DiaryManager;
use Liloi\Rune\Modules\Diary\Domain\Road\Manager as RoadManager;

/**
 * Rune API: Interstate60.Application.Diary.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $road = RoadManager::loadCurrent();

        $entity = DiaryManager::load($road->getKey(), self::getParameter('key_job'));

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity
        ]));

        return $response;
    }
}