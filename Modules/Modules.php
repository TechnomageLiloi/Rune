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
        $manager->add(new Method('Rune.Journal.Show', '\Liloi\Rune\Modules\Journal\API\Show\Method::execute'));
        $manager->add(new Method('Rune.Journal.Jobs.Create', '\Liloi\Rune\Modules\Journal\API\Jobs\Create\Method::execute'));
        $manager->add(new Method('Rune.Journal.Jobs.Edit', '\Liloi\Rune\Modules\Journal\API\Jobs\Edit\Method::execute'));
        $manager->add(new Method('Rune.Journal.Jobs.Save', '\Liloi\Rune\Modules\Journal\API\Jobs\Save\Method::execute'));
        $manager->add(new Method('Rune.Journal.Road.Edit', '\Liloi\Rune\Modules\Journal\API\Road\Edit\Method::execute'));
        $manager->add(new Method('Rune.Journal.Road.Save', '\Liloi\Rune\Modules\Journal\API\Road\Save\Method::execute'));
        return $manager;
    }
}