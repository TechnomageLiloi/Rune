<?php

namespace Liloi\Rune\Modules\Journal\API\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Journal\Domain\Road\Manager as RoadManager;
use Liloi\Rune\Modules\Journal\Domain\Jobs\Manager as JobsManager;

/**
 * Rune API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $day = RoadManager::load(date('Y-m-d'));
        $jobs = JobsManager::loadGroup($day->getKey());

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'day' => $day,
            'jobs' => $jobs
        ]));

        return $response;
    }
}