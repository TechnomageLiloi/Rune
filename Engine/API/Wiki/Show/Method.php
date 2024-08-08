<?php

namespace Liloi\Rune\API\Wiki\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Judex\Assert;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Domain\Config\Manager as ConfigManager;
use Liloi\Rune\Domain\Config\Keys as ConfigKeys;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $accessAdmin = self::accessGet();

        $URL = $_SERVER['REQUEST_URI'];

        if($URL === '/')
        {
            $RID = ConfigManager::load(ConfigKeys::CURRENT_RID)->getString() ?? 'rune';
        }
        else
        {
            $RID = AtomsManager::URLtoATOM($URL);
            ConfigManager::load(ConfigKeys::CURRENT_RID)->setString($RID)->save();
        }

        $entity = AtomsManager::load($RID);
        $children = AtomsManager::loadFiles($RID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'children' => $children,
            'entity' => $entity,
            'access' => $accessAdmin
        ]));
        return $response;
    }
}