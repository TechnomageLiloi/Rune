<?php

namespace Liloi\Rune\API\Lessons\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Lessons\Manager;

/**
 * Rune API: Blueprint.Blueprints.Create
 * @package Liloi\Blueprint\API\Blueprints\Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_problem = self::getParameter('key_problem');
        Manager::create($key_problem);
        return new Response();
    }
}