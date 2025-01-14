<?php

namespace Liloi\Rune;

use Liloi\Config\Pool;
use Liloi\Rune\API\Method;
use Liloi\Rune\API\Tree;
use Liloi\Rune\Domain\Manager;
use Rune\Application\Conceptual as ConceptualApplication;
use Liloi\Rune\API\Security\Error\Method as ErrorMethod;
use Liloi\Rune\Domain\Config\Manager as ConfigManager;
use Liloi\Rune\Domain\Config\Keys as ConfigKeys;
use Liloi\Rune\Domain\Databank\Manager as DatabankManager;

/**
 * @inheritDoc
 */
class Application extends ConceptualApplication
{
    /**
     * Configuration data ppol.
     *
     * @var Pool
     */
    private Pool $config;

    /**
     * Application constructor.
     *
     * @param Pool $config Configuration data object.
     */
    public function __construct(Pool $config)
    {
        $this->config = $config;
        Manager::setConfig($config);
        Method::setConfig($config);
    }

    /**
     * Gets configuration data object.
     *
     * @return Pool Configuration data object.
     */
    public function getConfig(): Pool
    {
        return $this->config;
    }

    /**
     * @inheritDoc
     */
    public function compile(): string
    {
        $this->bind();

        // If API requested, then 'method' post parameter would be set.
        if(isset($_POST['method']))
        {
            try {
                return Tree::getInstance()->execute();
            }
            catch (\Throwable $exp)
            {
                ErrorMethod::$exception = $exp;
                return ErrorMethod::execute()->asJson();
            }
        }

        $URL = $_SERVER['REQUEST_URI'];


        if($URL !== '/')
        {
            $RID = DatabankManager::URLtoRID($URL);

            if(strpos($RID, '.') === false)
            {
                ConfigManager::load(ConfigKeys::CURRENT)->setString($RID)->save();
            }
        }

        $admin = Security::check();

        return $this->render(__DIR__ . '/Layout.tpl', [
            'admin' => $admin
        ]);
    }

    /**
     * Bind external modules.
     *
     * Format: Module->bind($manager, $config);`
     */
    public function bind(): void
    {
        $manager = Tree::getInstance()->getManager();
        $config = $this->getConfig();
    }
}