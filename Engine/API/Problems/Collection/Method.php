<?php

namespace Liloi\Rune\API\Problems\Collection;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Problems\Manager;
use Liloi\Rune\Domain\Problems\Types;
use Liloi\Rune\Domain\Problems\Entity;
use Liloi\Rune\Domain\Degrees\Manager as DegreesManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $uid = self::getParameter('uid');

        $degree = DegreesManager::load($uid);

        $collection = Manager::loadCollection($uid);

        $group = [];
        foreach(array_keys(Types::$list) as $id)
        {
            $group[$id] = [];
        }

        /** @var Entity $entity */
        foreach ($collection as $entity)
        {
            $group[$entity->getType()][$entity->getKey()] = $entity;
        }

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'group' => $group,
            'types' => Types::$list,
            'degree' => $degree,
            'uid' => $uid
        ]));

        return $response;
    }
}