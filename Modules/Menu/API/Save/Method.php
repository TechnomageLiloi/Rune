<?php

namespace Liloi\Rune\Modules\Menu\API\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        return new Response();
    }
}