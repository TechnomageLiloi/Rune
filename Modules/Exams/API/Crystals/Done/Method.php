<?php

namespace Liloi\Rune\Modules\Exams\API\Crystals\Done;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Exams\Domain\Crystals\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $key_crystal = self::getParameter('key_crystal');
        $done = (bool)self::getParameter('done');

        Manager::setDoneParameter($key_crystal, $done);

        return new Response();
    }
}