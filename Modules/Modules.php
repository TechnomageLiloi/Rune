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
        $manager->add(new Method('Rune.Admin.Dashboard', '\Liloi\Rune\Modules\Admin\API\Dashboard\Method::execute'));
        $manager->add(new Method('Rune.Admin.Dump', '\Liloi\Rune\Modules\Admin\API\Dump\Method::execute'));
        $manager->add(new Method('Rune.Admin.Ping', '\Liloi\Rune\Modules\Admin\API\Ping\Method::execute'));
        $manager->add(new Method('Rune.Admin.Menu', '\Liloi\Rune\Modules\Admin\API\Menu\Method::execute'));
        $manager->add(new Method('Rune.Admin.Report', '\Liloi\Rune\Modules\Admin\API\Report\Method::execute'));
        $manager->add(new Method('Rune.Admin.Lock', '\Liloi\Rune\Modules\Admin\API\Lock\Method::execute'));

        return $manager;
    }
}