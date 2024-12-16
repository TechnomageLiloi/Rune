<?php

namespace Liloi\Rune\Modules\Exams\API\Questions\Done;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Modules\Exams\Domain\Questions\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $key_question = self::getParameter('key_question');
        $done = (bool)self::getParameter('done');

        Manager::setDoneParameter($key_question, $done);

        return new Response();
    }
}