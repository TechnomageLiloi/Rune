<?php

namespace Liloi\PoP\API\Security\Password\Check;

use Liloi\API\Response;
use Liloi\PoP\API\Method as SuperMethod;
use Liloi\PoP\Security;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $password = self::getParameter('pass');
        $hash = self::getConfig()->get('admin');
        $pass = false;

        if(password_verify($password, $hash))
        {
            $pass = true;
            Security::login();
        }

        $response = new Response();
        $response->set('pass', $pass);
        return $response;
    }
}