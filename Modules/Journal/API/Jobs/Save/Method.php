<?php

namespace Liloi\Rune\Modules\Journal\API\Jobs\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Journal\Domain\Jobs\Manager as JobsManager;

/**
 * Rune API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $job = JobsManager::load(
            self::getParameter('key_hour'),
            self::getParameter('key_quarter'),
            self::getParameter('key_day')
        );

        $job->setGoal(self::getParameter('goal'));
        $job->setStatus(self::getParameter('status'));
        $job->setXp(self::getParameter('xp'));

        $job->save();

        return new Response();
    }
}