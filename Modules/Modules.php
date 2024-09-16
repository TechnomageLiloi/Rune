<?php

namespace Liloi\Rune\Modules;

use Liloi\API\Manager as APIManager;
use Liloi\API\Method;

/**
 * @inheritDoc
 */
class Modules
{
    public static function collect(APIManager $manager): APIManager
    {
        $manager->add(new Method('Rune.Admin.Ping', '\Liloi\Rune\Modules\Admin\API\Ping\Method::execute'));

        return $manager;
    }
}