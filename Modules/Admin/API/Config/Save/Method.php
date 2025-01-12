<?php

namespace Liloi\Rune\Modules\Admin\API\Config\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Config\Manager as ConfigManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        ConfigManager::load(self::getParameter('key'))->setString(self::getParameter('value'))->save();
        return new Response();
    }
}