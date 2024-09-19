<?php

namespace Liloi\Rune\Modules\Exams\API\Questions\Collection;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Modules\Exams\Domain\Questions\Manager as QuestionsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $collection = QuestionsManager::loadCollection(self::getParameter('key_item'));

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection
        ]));

        return $response;
    }
}