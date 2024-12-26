<?php

namespace Liloi\Rune\Modules\Levels\API\Levels\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Levels\Domain\Levels\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        Manager::create();
        return new Response();
    }
}