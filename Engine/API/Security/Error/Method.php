<?php

namespace Liloi\Rune\API\Security\Error;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Logs\Manager  as LogsManager;

class Method extends SuperMethod
{
    public static \Throwable $exception;

    public static function execute(): Response
    {
        $entity = LogsManager::create(self::$exception);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity
        ]));

        return $response;
    }
}