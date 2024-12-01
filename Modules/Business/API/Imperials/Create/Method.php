<?php

namespace Liloi\Rune\Modules\Business\API\Imperials\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Business\Domain\Imperials\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        Manager::create();
        return new Response();
    }
}