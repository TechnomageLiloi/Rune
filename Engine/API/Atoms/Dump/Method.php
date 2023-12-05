<?php

namespace Liloi\Rune\API\Atoms\Dump;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $filDumper = ROOT_DIR . '/Rune.phar';

        if(file_exists($filDumper)) {
            unlink($filDumper);
        }

        $dirDumper = ROOT_DIR . '/vendor/technomage-liloi/dumper';
        $dirMeta = $dirDumper . '/Source/Meta';

        AtomsManager::dump($dirMeta);

        $oPhar = new \Phar($filDumper);
        $oPhar->startBuffering();

        $oPhar->setStub(\Phar::createDefaultStub('Dumper/Main.php'));
        $oPhar->buildFromDirectory($dirDumper . '/Source');
        $oPhar->stopBuffering();

        chmod($filDumper, 0777);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [

        ]));
        return $response;
    }
}