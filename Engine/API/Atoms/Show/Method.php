<?php

namespace Liloi\Rune\API\Atoms\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Security;
use Liloi\Rune\Exceptions\AccessException;
use Liloi\Rune\Domain\Config\Manager as ConfigManager;
use Liloi\Rune\Domain\Config\Keys as ConfigKeys;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];

        $stateURL = ConfigManager::load(ConfigKeys::STATE_URL);

        if($URL === '/')
        {
            $URL = $stateURL->getString();
        }

        $keyAtom = AtomsManager::URLtoATOM($URL);
        $entity = AtomsManager::load($keyAtom);
        $news = AtomsManager::loadNews($keyAtom);

        $isAdmin = self::accessGet();

        if(!$entity->isPublished() && !$isAdmin)
        {
            throw new AccessException();
        }

        $children = AtomsManager::loadFiles($keyAtom, !$isAdmin);

        $stateURL->setString($URL)->save();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'admin' => Security::check(),
            'children' => $children,
            'entity' => $entity,
            'news' => $news
        ]));
        return $response;
    }
}