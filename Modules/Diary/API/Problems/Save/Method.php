<?php

namespace Liloi\Rune\Modules\Diary\API\Problems\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Diary\Domain\Problems\Manager as ProblemsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $entity = ProblemsManager::load(self::getParameter('key_problem'));
        $entity->setSummary(self::getParameter('summary'));
        $entity->setKeyDegree(self::getParameter('key_degree'));
        $entity->save();

        return new Response();
    }
}