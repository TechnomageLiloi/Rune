<?php

namespace Liloi\Rune\Modules\Exams\API\Questions\Suite;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;
use Liloi\Rune\Modules\Exams\Domain\Questions\Manager;
use Liloi\Rune\Modules\Exams\API\Questions\Test\Method as TestMethod;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $key_item = self::getParameter('key_item');
        $collection = Manager::loadCollection($key_item);

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