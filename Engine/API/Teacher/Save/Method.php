<?php

namespace Liloi\Rune\API\Teacher\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Services\Cache;

class Method extends SuperMethod
{
    private const KEY = 'Teacher';

    public static function execute(): Response
    {
//        self::accessCheck();
        Cache::set(self::KEY, ['words' => self::getParameter('words')]);
        return new Response();
    }
}