<?php

namespace Liloi\Rune\API\Artifacts\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Domain\Artifacts\Manager as ArtifactsManager;

/**
 * Rune API: Interstate60.Application.Diary.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $RID = AtomsManager::URLtoATOM($_SERVER['REQUEST_URI']);
        ArtifactsManager::create($RID);
        return new Response();
    }
}