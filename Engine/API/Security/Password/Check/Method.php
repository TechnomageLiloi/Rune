<?php

namespace Liloi\Rune\API\Security\Password\Check;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Security;

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