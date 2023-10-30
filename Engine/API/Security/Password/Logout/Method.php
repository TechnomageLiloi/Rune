<?php

namespace Liloi\PoP\API\Security\Password\Logout;

use Liloi\API\Response;
use Liloi\PoP\API\Method as SuperMethod;
use Liloi\PoP\Security;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        Security::logout();
        return new Response();
    }
}