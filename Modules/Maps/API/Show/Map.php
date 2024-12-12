<?php

namespace Liloi\Rune\Modules\Maps\API\Show;

use Liloi\Rune\Domain\Databank\Entity as DatabankEntity;
use Liloi\Rune\Domain\Config\Manager as ConfigManager;
use Liloi\Rune\Domain\Config\Keys as ConfigKeys;

class Map
{
    private ?DatabankEntity $entity = null;

    public function __construct(
        DatabankEntity $entity
    ) {
        $this->entity = $entity;
    }

    public function load(): string
    {
        $data = (array)json_decode($this->entity->getData());

        $map = $this->entity->getMap();
        $data['map'] = explode("\n", $map);

        if(!isset($data['objects']))
        {
            $data['objects'] = [];
        }

        $data['x'] = (int)(ConfigManager::load(ConfigKeys::MAP_X)->getString() ?? 2);
        $data['y'] = (int)(ConfigManager::load(ConfigKeys::MAP_Y)->getString() ?? 2);

        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}