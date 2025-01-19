<?php

namespace Liloi\Rune\Modules\Exams\API\Crystals\Create;

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
        AtomsManager::updateLast(
            self::getParameter('note'),
            self::getParameter('status')
        );

        return new Response();
    }
}