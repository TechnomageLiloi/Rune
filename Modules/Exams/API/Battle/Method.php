<?php

namespace Liloi\Rune\Modules\Exams\API\Battle;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;
use Liloi\Rune\Modules\Exams\Domain\Opponents\Manager as OpponentsManager;
use Liloi\Rune\Modules\Exams\Domain\Opponents\Types;
use Liloi\Rune\Modules\Exams\Domain\Opponents\Entity;
use Liloi\Rune\Modules\Exams\Domain\Crystals\Statuses as CrystalsStatuses;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $URL = $_SERVER['REQUEST_URI'];
        $RID = DatabankManager::URLtoRID($URL);
        $entity = OpponentsManager::load(self::getParameter('key_opponent'), $RID);

        $response = new Response();
        $response->set('render', self::renderTest($entity));
        return $response;
    }

    public static function renderTest(Entity $entity): string
    {

        // @todo: encapsulate block at entity
        switch ($entity->getType())
        {
            case Types::CHECK:
                $template = 'Check'; break;
            case Types::RADIO:
                $template = 'Radio'; break;
            case Types::SENTENCE:
                $template = 'Sentence'; break;
            case Types::DONE:
                $template = 'Done'; break;
            case Types::VIDEO:
                $template = 'Video'; break;
            case Types::TIMER:
                $template = 'Timer'; break;
            case Types::CARD:
            default: $template = 'Card';
        }

        return static::render(__DIR__ . '/Question.tpl', [
            'entity' => $entity,
            'statuses' => CrystalsStatuses::$list,
            'inner' => static::render(__DIR__ . '/' . $template . '.tpl', [
                'entity' => $entity
            ])
        ]);
    }
}