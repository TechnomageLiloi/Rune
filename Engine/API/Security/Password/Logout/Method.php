<?php

namespace Liloi\Rune\API\Security\Password\Logout;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Security;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        Security::logout();
        return new Response();
    }
}