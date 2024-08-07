<?php

namespace Liloi\Rune\API\Teacher\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Services\Cache;

class Method extends SuperMethod
{
    // @todo: add teacher to domain.
    private const KEY = 'Teacher';

    public static function execute(): Response
    {
//        self::accessCheck();
        $words = Cache::exists(self::KEY) ? Cache::get(self::KEY)['words'] : '-';
        $RID = AtomsManager::URLtoATOM($_SERVER['REQUEST_URI']);
        $entity = AtomsManager::load($RID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'words' => $words,
            'entity' => $entity,
        ]));
        return $response;
    }
}