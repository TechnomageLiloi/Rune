<?php

namespace Liloi\Rune\Modules\Exams\API\Crystals\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Exams\Domain\Crystals\Manager as CrystalsManager;

/**
 * Rune API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        CrystalsManager::create(
            self::getParameter('key_opponent'),
            self::getParameter('rid')
        );

        return new Response();
    }
}