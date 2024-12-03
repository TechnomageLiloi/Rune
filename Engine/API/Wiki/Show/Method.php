<?php

namespace Liloi\Rune\API\Wiki\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Security;
use Liloi\Rune\Modules\News\Domain\Topics\Manager as TopicsManager;
use Liloi\Rune\Modules\Databank\Domain\Scrolls\Manager as ScrollsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];

        if($URL === '/')
        {
            $topics = TopicsManager::loadCollection();

            $response = new Response();
            $response->set('render', static::render(__DIR__ . '/News.tpl', [
                'topics' => $topics
            ]));
            return $response;
        }

        $accessAdmin = self::accessGet();

        $RID = AtomsManager::URLtoATOM($URL);

        $access = Security::check();

        $entity = AtomsManager::load($RID, !$access);
        $children = AtomsManager::loadFiles($RID, !$access);

        $scroll = ScrollsManager::loadByAtom($RID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Topic.tpl', [
            'children' => $children,
            'entity' => $entity,
            'scroll' => $scroll,
            'access' => $accessAdmin,
        ]));
        return $response;
    }
}