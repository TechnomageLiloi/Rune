<?php

namespace Liloi\Rune\Modules\Exams\API\Inventory\Remove;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Exams\Domain\Inventory\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $key_item = self::getParameter('key_item');
        $entity = Manager::load($key_item);
        $entity->remove();

        return new Response();
    }
}