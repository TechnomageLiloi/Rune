<?php

namespace Liloi\Rune\Modules\Journal\API\Atoms\Save;

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
        $atom = AtomsManager::load(
            self::getParameter('key_day'),
            self::getParameter('key_atom')
        );

        $atom->setGoal(self::getParameter('goal'));
        $atom->setStatus(self::getParameter('status'));
        $atom->setXp(self::getParameter('xp'));
        $atom->setStart(self::getParameter('start'));
        $atom->setFinish(self::getParameter('finish'));

        $atom->save();

        return new Response();
    }
}