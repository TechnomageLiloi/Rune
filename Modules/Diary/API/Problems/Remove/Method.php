<?php

namespace Liloi\Rune\Modules\Diary\API\Problems\Remove;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Diary\Domain\Problems\Manager as ProblemsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $entity = ProblemsManager::load(self::getParameter('key_problem'));
        $entity->remove();
        return new Response();
    }
}