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

        $manager->add(new Method('Rune.Maps.Show', '\Liloi\Rune\Modules\Maps\API\Show\Method::execute'));
        $manager->add(new Method('Rune.Maps.Inventory.Show', '\Liloi\Rune\Modules\Maps\API\Inventory\Show\Method::execute'));
        $manager->add(new Method('Rune.Maps.Inventory.Drop', '\Liloi\Rune\Modules\Maps\API\Inventory\Drop\Method::execute'));
        $manager->add(new Method('Rune.Maps.Inventory.Put', '\Liloi\Rune\Modules\Maps\API\Inventory\Put\Method::execute'));
        $manager->add(new Method('Rune.Maps.Inventory.Edit', '\Liloi\Rune\Modules\Maps\API\Inventory\Edit\Method::execute'));
        $manager->add(new Method('Rune.Maps.Inventory.Save', '\Liloi\Rune\Modules\Maps\API\Inventory\Save\Method::execute'));
        $manager->add(new Method('Rune.Maps.Inventory.Create', '\Liloi\Rune\Modules\Maps\API\Inventory\Create\Method::execute'));
        $manager->add(new Method('Rune.Maps.Save', '\Liloi\Rune\Modules\Maps\API\Save\Method::execute'));

        $manager->add(new Method('Rune.Teacher.Show', '\Liloi\Rune\Modules\Teacher\API\Show\Method::execute'));
        $manager->add(new Method('Rune.Teacher.Save', '\Liloi\Rune\Modules\Teacher\API\Save\Method::execute'));

        $manager->add(new Method('Rune.Menu.Show', '\Liloi\Rune\Modules\Menu\API\Show\Method::execute'));
        $manager->add(new Method('Rune.Menu.Save', '\Liloi\Rune\Modules\Menu\API\Save\Method::execute'));

        $manager->add(new Method('Rune.Quests.Quest.Create', '\Liloi\Rune\Modules\Quests\API\Quests\Create\Method::execute'));
        $manager->add(new Method('Rune.Quests.Quest.Show', '\Liloi\Rune\Modules\Quests\API\Quests\Show\Method::execute'));
        $manager->add(new Method('Rune.Quests.Quest.Edit', '\Liloi\Rune\Modules\Quests\API\Quests\Edit\Method::execute'));
        $manager->add(new Method('Rune.Quests.Quest.Save', '\Liloi\Rune\Modules\Quests\API\Quests\Save\Method::execute'));

        $manager->add(new Method('Rune.Exams.Crystals.Create', '\Liloi\Rune\Modules\Exams\API\Crystals\Create\Method::execute'));
        $manager->add(new Method('Rune.Exams.Crystals.Search', '\Liloi\Rune\Modules\Exams\API\Crystals\Search\Method::execute'));

        $manager->add(new Method('Rune.Exams.Opponents.Battle', '\Liloi\Rune\Modules\Exams\API\Battle\Method::execute'));
        $manager->add(new Method('Rune.Exams.Opponents.Show', '\Liloi\Rune\Modules\Exams\API\Show\Method::execute'));
        $manager->add(new Method('Rune.Exams.Opponents.Edit', '\Liloi\Rune\Modules\Exams\API\Edit\Method::execute'));
        $manager->add(new Method('Rune.Exams.Opponents.Save', '\Liloi\Rune\Modules\Exams\API\Save\Method::execute'));

        $manager->add(new Method('Rune.Quests.Tickets.Create', '\Liloi\Rune\Modules\Quests\API\Tickets\Create\Method::execute'));
        $manager->add(new Method('Rune.Quests.Tickets.Edit', '\Liloi\Rune\Modules\Quests\API\Tickets\Edit\Method::execute'));
        $manager->add(new Method('Rune.Quests.Tickets.Save', '\Liloi\Rune\Modules\Quests\API\Tickets\Save\Method::execute'));

        $manager->add(new Method('Rune.Levels.Collection', '\Liloi\Rune\Modules\Levels\API\Levels\Collection\Method::execute'));
        $manager->add(new Method('Rune.Levels.Show', '\Liloi\Rune\Modules\Levels\API\Levels\Show\Method::execute'));
        $manager->add(new Method('Rune.Levels.Edit', '\Liloi\Rune\Modules\Levels\API\Levels\Edit\Method::execute'));
        $manager->add(new Method('Rune.Levels.Save', '\Liloi\Rune\Modules\Levels\API\Levels\Save\Method::execute'));
        $manager->add(new Method('Rune.Levels.Create', '\Liloi\Rune\Modules\Levels\API\Levels\Create\Method::execute'));
        $manager->add(new Method('Rune.Levels.Remove', '\Liloi\Rune\Modules\Levels\API\Levels\Remove\Method::execute'));
        $manager->add(new Method('Rune.Levels.Plan', '\Liloi\Rune\Modules\Levels\API\Levels\Plan\Method::execute'));

        return $manager;
    }
}