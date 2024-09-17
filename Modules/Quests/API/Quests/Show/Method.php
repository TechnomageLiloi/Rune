<?php

namespace Liloi\Rune\Modules\Quests\API\Quests\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Quests\Domain\Jobs\Manager as JobsManager;
use Liloi\Rune\Modules\Quests\Domain\Quests\Manager as QuestsManager;

/**
 * Rune API: Interstate60.Application.Quests.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $step = QuestsManager::loadCurrent();

        $jobs = JobsManager::loadCollection($step->getKey());

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $step,
            'jobs' => $jobs
        ]));

        return $response;
    }
}