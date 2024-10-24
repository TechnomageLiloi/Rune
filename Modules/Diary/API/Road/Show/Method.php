<?php

namespace Liloi\Rune\Modules\Diary\API\Road\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Diary\Domain\Jobs\Manager as JobsManager;
use Liloi\Rune\Modules\Diary\Domain\Problems\Manager as ProblemsManager;
use Liloi\Rune\Modules\Diary\Domain\Problems\Entity as ProblemsEntity;
use Liloi\Rune\Modules\Diary\Domain\Road\Manager as RoadManager;

/**
 * Rune API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $step = RoadManager::loadCurrent();

        $jobs = JobsManager::loadCollection($step->getKey());
        $problems = ProblemsManager::loadCollection();
        $times = [];

        /**
         * @var int $key
         * @var ProblemsEntity $problem
         */
        foreach ((array)$problems as $key => $problem)
        {
            $number = $problem->getTime();

            if($number !== null)
            {
                $times[$number] = $problem;
                $problems->offsetUnset($key);
            }
        }

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $step,
            'jobs' => $jobs,
            'problems' => $problems,
            'times' => $times
        ]));

        return $response;
    }
}