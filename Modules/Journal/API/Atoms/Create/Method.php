<?php

namespace Liloi\Rune\Modules\Journal\API\Atoms\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Journal\Domain\Atoms\Manager as AtomsManager;

/**
 * Rune API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        AtomsManager::create(self::getParameter('key_day'));
        return new Response();
    }
}