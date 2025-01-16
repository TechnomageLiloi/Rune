<?php

namespace Liloi\Rune\Modules\Journal\API\Atoms\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Journal\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Modules\Journal\Domain\Atoms\Statuses as AtomsStatuses;

/**
 * Rune API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $atom = AtomsManager::load(
            self::getParameter('key_day'),
            self::getParameter('key_atom')
        );

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'atom' => $atom,
            'statuses' => AtomsStatuses::$list
        ]));

        return $response;
    }
}