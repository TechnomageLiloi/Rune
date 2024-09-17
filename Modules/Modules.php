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

        $manager->add(new Method('Rune.Diary.Road.Show', '\Liloi\Rune\Modules\Diary\API\Road\Show\Method::execute'));
        $manager->add(new Method('Rune.Diary.Road.Edit', '\Liloi\Rune\Modules\Diary\API\Road\Edit\Method::execute'));
        $manager->add(new Method('Rune.Diary.Road.Save', '\Liloi\Rune\Modules\Diary\API\Road\Save\Method::execute'));
        $manager->add(new Method('Rune.Diary.Jobs.Create', '\Liloi\Rune\Modules\Diary\API\Jobs\Create\Method::execute'));
        $manager->add(new Method('Rune.Diary.Jobs.Edit', '\Liloi\Rune\Modules\Diary\API\Jobs\Edit\Method::execute'));
        $manager->add(new Method('Rune.Diary.Jobs.Save', '\Liloi\Rune\Modules\Diary\API\Jobs\Save\Method::execute'));

        $manager->add(new Method('Rune.Quests.Quest.Show', '\Liloi\Rune\Modules\Quests\API\Quests\Show\Method::execute'));
        $manager->add(new Method('Rune.Quests.Quest.Edit', '\Liloi\Rune\Modules\Quests\API\Quests\Edit\Method::execute'));
        $manager->add(new Method('Rune.Quests.Quest.Save', '\Liloi\Rune\Modules\Quests\API\Quests\Save\Method::execute'));

        $manager->add(new Method('Rune.Quests.Tickets.Create', '\Liloi\Rune\Modules\Quests\API\Tickets\Create\Method::execute'));
        $manager->add(new Method('Rune.Quests.Tickets.Edit', '\Liloi\Rune\Modules\Quests\API\Tickets\Edit\Method::execute'));
        $manager->add(new Method('Rune.Quests.Tickets.Save', '\Liloi\Rune\Modules\Quests\API\Tickets\Save\Method::execute'));

        return $manager;
    }
}