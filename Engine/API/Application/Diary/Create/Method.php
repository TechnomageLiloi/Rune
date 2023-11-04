<?php

namespace Liloi\Rune\API\Application\Diary\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Diary\Manager as DiaryManager;

/**
 * Rune API: Tardis.Application.Diary.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        DiaryManager::create();
        return new Response();
    }
}