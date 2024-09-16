<?php

namespace Liloi\Rune\Modules\Diary\API\Road;

use Liloi\API\Response;
use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Road\Manager as DiaryManager;
use Liloi\I60\Domain\Road\Types as DiaryTypes;

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
            'entity' => $entity,
            'types' => DiaryTypes::$list,
        ]));

        return $response;
    }
}