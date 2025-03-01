<?php

namespace Liloi\Rune\API\Maps\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Maps\Manager as MapsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_map = self::getParameter('key_map');
        $entity = MapsManager::load($key_map);

        $entity->setTitle(self::getParameter('title'));
        $entity->setMap(self::getParameter('map'));
        $entity->setDt(self::getParameter('dt'));
        $entity->setData(self::getParameter('data'));

        $entity->save();

        return new Response();
    }
}