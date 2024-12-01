<?php

namespace Liloi\Rune\Modules\Admin\API\Dashboard;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Diary\Domain\Jobs\Manager as JobsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $job = JobsManager::loadCurrent();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'job' => $job
        ]));
        return $response;
    }
}