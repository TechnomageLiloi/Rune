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

        $manager->add(new Method('Rune.Diary.Road.Show', '\Liloi\Rune\Modules\Diary\API\Road\Show\Method::execute'));
        $manager->add(new Method('Rune.Diary.Road.Edit', '\Liloi\Rune\Modules\Diary\API\Road\Edit\Method::execute'));
        $manager->add(new Method('Rune.Diary.Road.Save', '\Liloi\Rune\Modules\Diary\API\Road\Save\Method::execute'));
        $manager->add(new Method('Rune.Diary.Jobs.Create', '\Liloi\Rune\Modules\Diary\API\Jobs\Create\Method::execute'));
        $manager->add(new Method('Rune.Diary.Jobs.Edit', '\Liloi\Rune\Modules\Diary\API\Jobs\Edit\Method::execute'));
        $manager->add(new Method('Rune.Diary.Jobs.Save', '\Liloi\Rune\Modules\Diary\API\Jobs\Save\Method::execute'));
        $manager->add(new Method('Rune.Diary.Problems.Create', '\Liloi\Rune\Modules\Diary\API\Problems\Create\Method::execute'));
        $manager->add(new Method('Rune.Diary.Problems.Remove', '\Liloi\Rune\Modules\Diary\API\Problems\Remove\Method::execute'));
        $manager->add(new Method('Rune.Diary.Problems.Edit', '\Liloi\Rune\Modules\Diary\API\Problems\Edit\Method::execute'));
        $manager->add(new Method('Rune.Diary.Problems.Save', '\Liloi\Rune\Modules\Diary\API\Problems\Save\Method::execute'));

        $manager->add(new Method('Rune.Quests.Quest.Create', '\Liloi\Rune\Modules\Quests\API\Quests\Create\Method::execute'));
        $manager->add(new Method('Rune.Quests.Quest.Show', '\Liloi\Rune\Modules\Quests\API\Quests\Show\Method::execute'));
        $manager->add(new Method('Rune.Quests.Quest.Edit', '\Liloi\Rune\Modules\Quests\API\Quests\Edit\Method::execute'));
        $manager->add(new Method('Rune.Quests.Quest.Save', '\Liloi\Rune\Modules\Quests\API\Quests\Save\Method::execute'));

        $manager->add(new Method('Rune.Quests.Tickets.Create', '\Liloi\Rune\Modules\Quests\API\Tickets\Create\Method::execute'));
        $manager->add(new Method('Rune.Quests.Tickets.Edit', '\Liloi\Rune\Modules\Quests\API\Tickets\Edit\Method::execute'));
        $manager->add(new Method('Rune.Quests.Tickets.Save', '\Liloi\Rune\Modules\Quests\API\Tickets\Save\Method::execute'));

        $manager->add(new Method('Rune.Exams.Questions.Collection', '\Liloi\Rune\Modules\Exams\API\Questions\Collection\Method::execute'));
        $manager->add(new Method('Rune.Exams.Questions.Create', '\Liloi\Rune\Modules\Exams\API\Questions\Create\Method::execute'));
        $manager->add(new Method('Rune.Exams.Questions.Remove', '\Liloi\Rune\Modules\Exams\API\Questions\Remove\Method::execute'));
        $manager->add(new Method('Rune.Exams.Questions.Edit', '\Liloi\Rune\Modules\Exams\API\Questions\Edit\Method::execute'));
        $manager->add(new Method('Rune.Exams.Questions.Save', '\Liloi\Rune\Modules\Exams\API\Questions\Save\Method::execute'));
        $manager->add(new Method('Rune.Exams.Questions.Show', '\Liloi\Rune\Modules\Exams\API\Questions\Show\Method::execute'));
        $manager->add(new Method('Rune.Exams.Questions.Test', '\Liloi\Rune\Modules\Exams\API\Questions\Test\Method::execute'));
        $manager->add(new Method('Rune.Exams.Questions.Suite', '\Liloi\Rune\Modules\Exams\API\Questions\Suite\Method::execute'));

        $manager->add(new Method('Rune.Exams.Inventory.Collection', '\Liloi\Rune\Modules\Exams\API\Inventory\Collection\Method::execute'));
        $manager->add(new Method('Rune.Exams.Inventory.Create', '\Liloi\Rune\Modules\Exams\API\Inventory\Create\Method::execute'));
        $manager->add(new Method('Rune.Exams.Inventory.Remove', '\Liloi\Rune\Modules\Exams\API\Inventory\Remove\Method::execute'));
        $manager->add(new Method('Rune.Exams.Inventory.Edit', '\Liloi\Rune\Modules\Exams\API\Inventory\Edit\Method::execute'));
        $manager->add(new Method('Rune.Exams.Inventory.Save', '\Liloi\Rune\Modules\Exams\API\Inventory\Save\Method::execute'));
        $manager->add(new Method('Rune.Exams.Inventory.Show', '\Liloi\Rune\Modules\Exams\API\Inventory\Show\Method::execute'));

        $manager->add(new Method('Rune.Cards.Collection', '\Liloi\Rune\Modules\Cards\API\Cards\Collection\Method::execute'));
        $manager->add(new Method('Rune.Cards.Show', '\Liloi\Rune\Modules\Cards\API\Cards\Show\Method::execute'));
        $manager->add(new Method('Rune.Cards.Edit', '\Liloi\Rune\Modules\Cards\API\Cards\Edit\Method::execute'));
        $manager->add(new Method('Rune.Cards.Save', '\Liloi\Rune\Modules\Cards\API\Cards\Save\Method::execute'));
        $manager->add(new Method('Rune.Cards.Create', '\Liloi\Rune\Modules\Cards\API\Cards\Create\Method::execute'));
        $manager->add(new Method('Rune.Cards.Remove', '\Liloi\Rune\Modules\Cards\API\Cards\Remove\Method::execute'));

        $manager->add(new Method('Rune.Imperials.Collection', '\Liloi\Rune\Modules\Business\API\Imperials\Collection\Method::execute'));
        $manager->add(new Method('Rune.Imperials.Show', '\Liloi\Rune\Modules\Business\API\Imperials\Show\Method::execute'));
        $manager->add(new Method('Rune.Imperials.Edit', '\Liloi\Rune\Modules\Business\API\Imperials\Edit\Method::execute'));
        $manager->add(new Method('Rune.Imperials.Save', '\Liloi\Rune\Modules\Business\API\Imperials\Save\Method::execute'));
        $manager->add(new Method('Rune.Imperials.Create', '\Liloi\Rune\Modules\Business\API\Imperials\Create\Method::execute'));
        $manager->add(new Method('Rune.Imperials.Remove', '\Liloi\Rune\Modules\Business\API\Imperials\Remove\Method::execute'));

        $manager->add(new Method('Rune.Degrees.Collection', '\Liloi\Rune\Modules\Degrees\API\Degrees\Collection\Method::execute'));
        $manager->add(new Method('Rune.Degrees.Show', '\Liloi\Rune\Modules\Degrees\API\Degrees\Show\Method::execute'));
        $manager->add(new Method('Rune.Degrees.Edit', '\Liloi\Rune\Modules\Degrees\API\Degrees\Edit\Method::execute'));
        $manager->add(new Method('Rune.Degrees.Save', '\Liloi\Rune\Modules\Degrees\API\Degrees\Save\Method::execute'));
        $manager->add(new Method('Rune.Degrees.Create', '\Liloi\Rune\Modules\Degrees\API\Degrees\Create\Method::execute'));
        $manager->add(new Method('Rune.Degrees.Remove', '\Liloi\Rune\Modules\Degrees\API\Degrees\Remove\Method::execute'));

        $manager->add(new Method('Rune.Maps.Show', '\Liloi\Rune\Modules\Maps\API\Show\Method::execute'));

        return $manager;
    }
}