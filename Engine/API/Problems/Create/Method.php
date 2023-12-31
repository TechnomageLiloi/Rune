<?php

namespace Liloi\Rune\API\Problems\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Problems\Manager;

/**
 * Rune API: Blueprint.Blueprints.Create
 * @package Liloi\Blueprint\API\Blueprints\Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $key_blueprint = self::getParameter('key_blueprint');
        $id_type = self::getParameter('id_type');
        Manager::create($key_blueprint, $id_type);
        return new Response();
    }
}