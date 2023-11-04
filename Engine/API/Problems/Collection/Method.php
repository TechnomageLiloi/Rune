<?php

namespace Liloi\Rune\API\Problems\Collection;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Problems\Manager as ProblemsManager;
use Liloi\Rune\Domain\Problems\Types as ProblemsTypes;
use Liloi\Rune\Domain\Problems\Entity as ProblemsEntity;
use Liloi\Rune\Domain\Degrees\Manager as DegreesManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $uid = self::getParameter('uid');

        $degree = DegreesManager::load($uid);

        $collection = ProblemsManager::loadCollection($uid);
        $types = ProblemsTypes::$list;

        $group = [];
        foreach(array_keys($types) as $id)
        {
            $group[$id] = [];
        }

        /** @var ProblemsEntity $entity */
        foreach ($collection as $entity)
        {
            $group[$entity->getType()][$entity->getKey()] = $entity;
        }

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'degree' => $degree,
            'group' => $group,
            'types' => $types,
            'uid' => $uid,
        ]));

        return $response;
    }
}