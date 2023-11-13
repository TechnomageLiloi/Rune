<?php

namespace Liloi\Rune\API\Tickets\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Tickets\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key = self::getParameter('key_project');
        Manager::create($key);
        return new Response();
    }
}