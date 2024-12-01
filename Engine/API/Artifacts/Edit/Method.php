<?php

namespace Liloi\Rune\API\Artifacts\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Artifacts\Manager as ArtifactsManager;
use Liloi\Rune\Domain\Artifacts\Types as ArtifactsTypes;

/**
 * Rune API: Interstate60.Application.Diary.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $entity = ArtifactsManager::load(self::getParameter('key_artifact'));

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'types' => ArtifactsTypes::$list
        ]));

        return $response;
    }
}