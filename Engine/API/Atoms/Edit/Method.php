<?php

namespace Liloi\Rune\API\Atoms\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Domain\Atoms\Statuses as AtomsStatuses;
use Liloi\Rune\Domain\Atoms\Types as AtomsTypes;

/**
 * API: Rune.Atoms.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $last = filter_var(self::getParameter('last'), FILTER_VALIDATE_BOOLEAN);

        if(!$last)
        {
            $URL = $_SERVER['REQUEST_URI'];
            $RID = AtomsManager::URLtoATOM($URL);
            $entity = AtomsManager::load($RID);
        }
        else
        {
            $entity = AtomsManager::loadLast();
        }

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => AtomsStatuses::$list,
            'types' => AtomsTypes::$list
        ]));

        return $response;
    }
}