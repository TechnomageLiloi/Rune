<?php

namespace Liloi\Rune\Modules\Levels\API\Levels\Collection;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Levels\Domain\Levels\Manager as LevelsManager;
use Liloi\Rune\Modules\Levels\Domain\Lessons\Manager as LessonsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection = LevelsManager::loadCollection();
        $lessons = LessonsManager::loadGroup();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection,
            'lessons' => $lessons,
        ]));

        return $response;
    }
}