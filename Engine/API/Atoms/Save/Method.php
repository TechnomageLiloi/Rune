<?php

namespace Liloi\Rune\API\Atoms\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $keyAtom = self::getParameter('key_atom');
        $entity = AtomsManager::load($keyAtom);

        $entity->setTitle(self::getParameter('title'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setType(self::getParameter('type'));
        $entity->setSummary(self::getParameter('summary'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setData(self::getParameter('data'));
        $entity->setTags(self::getParameter('tags'));
        $entity->setTs(self::getParameter('ts'));

        $entity->save();

        return new Response();
    }
}