<?php

namespace Liloi\Rune\Modules\Exams\API\Questions\Suite;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Modules\Exams\Domain\Questions\Manager;
use Liloi\Rune\API\Questions\Test\Method as TestMethod;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $URL = $_SERVER['REQUEST_URI'];
        $RID = AtomsManager::URLtoATOM($URL);
        $tags = self::getParameter('tags');
        $collection = Manager::loadByTags($tags, $RID);

        $renders = [];
        foreach($collection as $entity)
        {
            $renders[] = TestMethod::renderTest($entity);
        }

        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'renders' => $renders
        ]));

        return $response;
    }
}