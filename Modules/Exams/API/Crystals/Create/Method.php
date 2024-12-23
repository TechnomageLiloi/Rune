<?php

namespace Liloi\Rune\Modules\Exams\API\Crystals\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;
use Liloi\Rune\Modules\Exams\Domain\Crystals\Manager as CrystalsManager;

/**
 * Rune API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $RID = DatabankManager::URLtoRID($URL);

        CrystalsManager::create(
            self::getParameter('key_opponent'),
            $RID,
            self::getParameter('status'),
            self::getParameter('data')
        );

        return new Response();
    }
}