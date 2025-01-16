<?php

namespace Liloi\Rune\Modules\Journal\API\Atoms\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Journal\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Modules\Journal\Domain\Atoms\Statuses as AtomsStatuses;

/**
 * Rune API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $job = AtomsManager::load(
            self::getParameter('key_hour'),
            self::getParameter('key_quarter'),
            self::getParameter('key_day')
        );

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'job' => $job,
            'statuses' => AtomsStatuses::$list
        ]));

        return $response;
    }
}