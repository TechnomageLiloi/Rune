<?php

namespace Liloi\Rune\Modules\Diary\API\Road\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Diary\Domain\Road\Manager as DiaryManager;

/**
 * Rune API: Interstate60.Application.Diary.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = DiaryManager::load(self::getParameter('key_step'));

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity
        ]));

        return $response;
    }
}