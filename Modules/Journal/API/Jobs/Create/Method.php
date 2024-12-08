<?php

namespace Liloi\Rune\Modules\Journal\API\Jobs\Create;

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

        JobsManager::create(
            self::getParameter('key_hour'),
            self::getParameter('key_quarter'),
            self::getParameter('key_day')
        );

        return new Response();
    }
}