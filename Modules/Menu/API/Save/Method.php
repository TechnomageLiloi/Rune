<?php

namespace Liloi\Rune\Modules\Menu\API\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Config\Manager as ConfigManager;
use Liloi\Rune\Domain\Config\Keys as ConfigKeys;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        ConfigManager::load(ConfigKeys::MAP_X)->setString(self::getParameter('x'))->save();
        ConfigManager::load(ConfigKeys::MAP_Y)->setString(self::getParameter('y'))->save();

        return new Response();
    }
}