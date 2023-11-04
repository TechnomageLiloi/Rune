<?php

namespace Liloi\Rune\API\Application\Diary\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Diary\Manager as DiaryManager;
use Liloi\Rune\Domain\Lessons\Manager as LessonsManager;

/**
 * Rune API: Tardis.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $entityDiary = DiaryManager::loadCurrent();
        $entityLesson = LessonsManager::loadCurrent();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entityDiary,
            'lesson' => $entityLesson
        ]));

        return $response;
    }
}