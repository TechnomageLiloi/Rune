<?php

namespace Liloi\Rune\Modules\News\API\Topics\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\News\Domain\Topics\Statuses as TopicsStatuses;
use Liloi\Rune\Modules\News\Domain\Topics\Manager as TopicsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $entity = TopicsManager::load(self::getParameter('key_topic'));

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => TopicsStatuses::$list,
        ]));

        return $response;
    }
}