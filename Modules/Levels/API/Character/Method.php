<?php

namespace Liloi\Rune\Modules\Levels\API\Character;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Levels\Domain\Levels\Manager as LevelsManager;
use Liloi\Rune\Domain\Config\Manager as ConfigManager;
use Liloi\Rune\Domain\Config\Keys as ConfigKeys;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'fullname' => ConfigManager::load(ConfigKeys::GAMER_FULL_NAME)->getString() ?? 'Enter full name',
            'nickname' => ConfigManager::load(ConfigKeys::GAMER_NICK_NAME)->getString() ?? 'Enter nick name',
            'level' => LevelsManager::loadLevel()
        ]));

        return $response;
    }
}