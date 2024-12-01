<?php

namespace Liloi\Rune\Modules\Admin\API\Report;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Diary\Domain\Jobs\Manager as JobsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $from = date('Y-m-d', strtotime('monday this week'));
        $to = date('Y-m-d', strtotime('sunday this week'));

        $jobs = JobsManager::loadByPeriod($from, $to);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'jobs' => $jobs,
            'report' => $jobs->getByDays()
        ]));
        return $response;
    }
}