<?php

namespace Liloi\Rune\API\Application\Diary\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Diary\Manager as DiaryManager;
use Liloi\Rune\Domain\Lessons\Manager as LessonsManager;
use Liloi\Rune\Domain\Lessons\Status;

/**
 * Rune API: Rune.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $dt = self::getParameter('dt');

        if($dt === 'now')
        {
            $dt = date('Y-m-d');
        }

        $entityDiary = DiaryManager::load($dt);
        $collectionLesson = LessonsManager::loadByDate($dt);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entityDiary,
            'lessons' => $collectionLesson,
            'dt' => $dt,
            'statuses' => Status::$list
        ]));

        return $response;
    }
}