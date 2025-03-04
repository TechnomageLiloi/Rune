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
        $manager->add(new Method('Rune.Wiki.Show', '\Liloi\Rune\Modules\Wiki\Show\Method::execute'));

        $manager->add(new Method('Rune.Exams.Quests.Battle', '\Liloi\Rune\Modules\Exams\API\Battle\Method::execute'));
        $manager->add(new Method('Rune.Exams.Quests.Show', '\Liloi\Rune\Modules\Exams\API\Show\Method::execute'));
        $manager->add(new Method('Rune.Exams.Quests.Edit', '\Liloi\Rune\Modules\Exams\API\Edit\Method::execute'));
        $manager->add(new Method('Rune.Exams.Quests.Save', '\Liloi\Rune\Modules\Exams\API\Save\Method::execute'));

        $manager->add(new Method('Rune.Exams.Crystals.Create', '\Liloi\Rune\Modules\Exams\API\Crystals\Create\Method::execute'));
        $manager->add(new Method('Rune.Exams.Crystals.Search', '\Liloi\Rune\Modules\Exams\API\Crystals\Search\Method::execute'));

        return $manager;
    }
}