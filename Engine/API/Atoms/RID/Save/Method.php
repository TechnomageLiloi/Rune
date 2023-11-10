<?php

namespace Liloi\Rune\API\Atoms\RID\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $ridOld = self::getParameter('rid_old');
        $ridNew = self::getParameter('rid_new');

        AtomsManager::ridChange($ridOld, $ridNew);
        return new Response();
    }
}