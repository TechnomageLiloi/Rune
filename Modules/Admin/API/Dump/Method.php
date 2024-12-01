<?php

namespace Liloi\Rune\Modules\Admin\API\Dump;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Artifacts\Manager as ArtifactsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        ArtifactsManager::dump(ROOT_DIR . '/Pool/Archive.atom');

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl'));
        return $response;
    }
}