<?php

namespace Liloi\Rune\API\Plan\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Degrees\Manager as DegreesManager;
use Liloi\Rune\Domain\Diary\Manager as DiaryManager;
use Liloi\Rune\Domain\Lessons\Manager as LessonsManager;
use Liloi\Rune\Domain\Problems\Manager as ProblemsManager;
use Liloi\Rune\Domain\Problems\Types as ProblemsTypes;
use Liloi\Rune\Domain\Problems\Entity as ProblemsEntity;

/**
 * Rune API: Tardis.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $degree = DegreesManager::loadCurrent();
        $problems = ProblemsManager::loadForPlan($degree->getKey());

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'problems' => $problems
        ]));

        return $response;
    }
}