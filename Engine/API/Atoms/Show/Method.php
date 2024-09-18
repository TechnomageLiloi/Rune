<?php

namespace Liloi\Rune\API\Atoms\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Artifacts\Manager as ArtifactsManager;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Modules\Exams\Domain\Inventory\Manager as InventoryManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $URL = $_SERVER['REQUEST_URI'];

        $RID = AtomsManager::URLtoATOM($URL);

        $entity = AtomsManager::load($RID);
        $children = AtomsManager::loadFiles($RID);
        $artifacts = ArtifactsManager::loadCollection($RID);
        $inventory = InventoryManager::loadCollection($RID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'artifacts' => $artifacts,
            'children' => $children,
            'entity' => $entity,
            'inventory' => $inventory,
        ]));
        return $response;
    }
}