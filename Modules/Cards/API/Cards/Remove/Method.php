<?php

namespace Liloi\Rune\Modules\Cards\API\Cards\Remove;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Cards\Domain\Cards\Manager;
use Liloi\Rune\Modules\Cards\Domain\Cards\Statuses;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = Manager::load(self::getParameter('key'));
        $entity->setStatus(Statuses::OBSOLETE);
        $entity->save();

        return new Response();
    }
}