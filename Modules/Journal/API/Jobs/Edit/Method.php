<?php

namespace Liloi\Rune\Modules\Journal\API\Jobs\Edit;

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
        );

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'job' => $job
        ]));

        return $response;
    }
}