<?php

namespace Liloi\Rune\API\Atoms\Dump;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [

        ]));
        return $response;
    }
}