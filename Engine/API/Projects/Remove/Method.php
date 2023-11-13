<?php

namespace Liloi\Rune\API\Projects\Remove;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Projects\Manager;
use Liloi\Rune\Domain\Projects\Statuses;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = Manager::load(self::getParameter('key'));
        $entity->setStatus(Statuses::PAST);
        $entity->save();

        return new Response();
    }
}