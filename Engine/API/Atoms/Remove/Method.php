<?php

namespace Liloi\Rune\API\Atoms\Remove;

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

        $keyAtom = self::getParameter('key_atom');
        $entity = AtomsManager::load($keyAtom);
        $entity->remove();

        return new Response();
    }
}