<?php

namespace Liloi\Rune\API\Application\Diary\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Diary\Manager as DiaryManager;
use Liloi\Rune\Domain\Diary\Statuses as DiaryStatuses;
use Liloi\Rune\Domain\Diary\Types as DiaryTypes;

/**
 * Rune API: Rune.Application.Diary.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = DiaryManager::loadCurrent();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => DiaryStatuses::$list,
            'types' => DiaryTypes::$list,
        ]));

        return $response;
    }
}