<?php

namespace Liloi\Rune\API\Exams\Questions\Collection;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Questions\Manager;
use Liloi\Rune\Domain\Questions\Types;
use Liloi\Rune\Domain\Questions\Entity;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection = Manager::loadCollection(7);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection
        ]));

        return $response;
    }
}