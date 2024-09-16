<?php

namespace Liloi\Rune\Modules\Diary\API\Road\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Diary\Domain\Road\Manager as DiaryManager;

/**
 * Rune API: Interstate60.Application.Diary.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = DiaryManager::load(self::getParameter('key_step'));

        $entity->setData(self::getParameter('data'));
        $entity->setSummary(self::getParameter('summary'));
        $entity->setType(self::getParameter('type'));

        $entity->save();

        return new Response();
    }
}