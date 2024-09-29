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
        $manager->add(new Method('Rune.Admin.Menu', '\Liloi\Rune\Modules\Admin\API\Menu\Method::execute'));

        $manager->add(new Method('Rune.Diary.Road.Show', '\Liloi\Rune\Modules\Diary\API\Road\Show\Method::execute'));
        $manager->add(new Method('Rune.Diary.Road.Edit', '\Liloi\Rune\Modules\Diary\API\Road\Edit\Method::execute'));
        $manager->add(new Method('Rune.Diary.Road.Save', '\Liloi\Rune\Modules\Diary\API\Road\Save\Method::execute'));
        $manager->add(new Method('Rune.Diary.Jobs.Create', '\Liloi\Rune\Modules\Diary\API\Jobs\Create\Method::execute'));
        $manager->add(new Method('Rune.Diary.Jobs.Edit', '\Liloi\Rune\Modules\Diary\API\Jobs\Edit\Method::execute'));
        $manager->add(new Method('Rune.Diary.Jobs.Save', '\Liloi\Rune\Modules\Diary\API\Jobs\Save\Method::execute'));

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

        return $manager;
    }
}