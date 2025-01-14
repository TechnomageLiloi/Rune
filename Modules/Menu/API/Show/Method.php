<?php

namespace Liloi\Rune\Modules\Menu\API\Show;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Config\Keys as ConfigKeys;
use Liloi\Rune\Domain\Config\Manager as ConfigManager;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $RID = ConfigManager::load(ConfigKeys::CURRENT)->getString() ?? 'portal';
        $link = DatabankManager::RIDtoURL($RID);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'link' => $link
        ]));

        return $response;
    }
}