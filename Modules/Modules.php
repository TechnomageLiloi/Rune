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

        $manager->add(new Method('Rune.Exams.Crystals.Battle', '\Liloi\Rune\Modules\Exams\API\Battle\Method::execute'));
        $manager->add(new Method('Rune.Exams.Crystals.Show', '\Liloi\Rune\Modules\Exams\API\Show\Method::execute'));
        $manager->add(new Method('Rune.Exams.Crystals.Edit', '\Liloi\Rune\Modules\Exams\API\Edit\Method::execute'));
        $manager->add(new Method('Rune.Exams.Crystals.Save', '\Liloi\Rune\Modules\Exams\API\Save\Method::execute'));

        return $manager;
    }
}