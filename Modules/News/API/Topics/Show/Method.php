<?php

namespace Liloi\Rune\Modules\News\API\Topics\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\News\Domain\Topics\Manager as TopicsManager;

/**
 * Rune API: Interstate60.Application.Quests.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();

        $topics = TopicsManager::loadCollection();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'topics' => $topics
        ]));

        return $response;
    }
}