<?php

namespace Liloi\Rune\Modules\Levels\API\Quests\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Levels\Domain\Quests\Manager as QuestsManager;

/**
 * Rune API: Interstate60.Application.Quests.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $entity = QuestsManager::load(self::getParameter('key_quest'));

        if(self::getParameterExist('data'))
        {
            $entity->setData(self::getParameter('data'));
        }

        if(self::getParameterExist('summary'))
        {
            $entity->setSummary(self::getParameter('summary'));
        }

        if(self::getParameterExist('status'))
        {
            $entity->setStatus(self::getParameter('status'));
        }

        if(self::getParameterExist('dt'))
        {
            $entity->setDt(self::getParameter('dt'));
        }

        if(self::getParameterExist('xp'))
        {
            $entity->setXp(self::getParameter('xp'));
        }

        if(self::getParameterExist('key_level'))
        {
            $entity->setKeyLevel(self::getParameter('key_level'));
        }

        $entity->save();

        return new Response();
    }
}