<?php

namespace Liloi\Rune\Modules\Diary\API\Jobs\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Diary\Domain\Road\Manager as RoadManager;
use Liloi\Rune\Modules\Diary\Domain\Jobs\Manager as JobsManager;

/**
 * Rune API: Interstate60.Application.Diary.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $road = RoadManager::loadCurrent();

        JobsManager::create($road);
        return new Response();
    }
}