<?php

namespace Liloi\Rune\Modules\Admin\API\Lock;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Config\Manager as ConfigManager;
use Liloi\Rune\Domain\Config\Keys as ConfigKeys;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $locked = self::getParameter('locked');
        ConfigManager::load(ConfigKeys::LOCKED)->setString($locked)->save();
        return new Response();
    }
}