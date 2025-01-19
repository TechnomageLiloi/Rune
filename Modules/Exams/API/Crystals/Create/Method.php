<?php

namespace Liloi\Rune\Modules\Exams\API\Crystals\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;
use Liloi\Rune\Modules\Journal\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Modules\Journal\Domain\Atoms\Statuses as AtomsStatuses;

/**
 * Rune API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        AtomsManager::updateLast(
            self::getParameter('status')
        );

        return new Response();
    }
}