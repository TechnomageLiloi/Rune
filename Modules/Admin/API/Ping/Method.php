<?php

namespace Liloi\Rune\Modules\Admin\API\Ping;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $response = new Response();
        $response->set('render', self::getParameter('ping'));
        return $response;
    }
}