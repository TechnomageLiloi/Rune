<?php

namespace Liloi\Rune\Modules\Exams\API\Questions\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Modules\Exams\Domain\Questions\Manager;

/**
 * Rune API: Blueprint.Blueprints.Create
 * @package Liloi\Blueprint\API\Blueprints\Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $URL = $_SERVER['REQUEST_URI'];
        $RID = AtomsManager::URLtoATOM($URL);
        Manager::create($RID);
        return new Response();
    }
}