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

        $manager->add(new Method('Rune.Diary.Road.Create', '\Liloi\Rune\Modules\Diary\API\Road\Create\Method::execute'));
        $manager->add(new Method('Rune.Diary.Road.Show', '\Liloi\Rune\Modules\Diary\API\Road\Show\Method::execute'));
        $manager->add(new Method('Rune.Diary.Road.Edit', '\Liloi\Rune\Modules\Diary\API\Road\Edit\Method::execute'));
        $manager->add(new Method('Rune.Diary.Road.Save', '\Liloi\Rune\Modules\Diary\API\Road\Save\Method::execute'));

        return $manager;
    }
}