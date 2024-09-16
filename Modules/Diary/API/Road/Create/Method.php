<?php

namespace Liloi\Rune\Modules\Diary\API\Road\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Diary\Domain\Road\Manager as DiaryManager;

/**
 * Rune API: Interstate60.Application.Diary.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        DiaryManager::create();
        return new Response();
    }
}