<?php

namespace Liloi\Rune\Modules\Maps\API\Show;

use Liloi\Rune\Domain\Atoms\Entity as AtomsEntity;
use Liloi\Rune\Exceptions\NotImplementedException;

class Map
{
    private ?AtomsEntity $entity = null;

    public function __construct(AtomsEntity $entity)
    {
        $this->entity = $entity;
    }

    public function load(): string
    {
        $data = (array)json_decode($this->entity->getData());

        if(!isset($data['map']))
        {
            $line = '...............................';
            $map = array_fill(0, 31, $line);

            $data['map'] = $map;
        }

        if(!isset($data['objects']))
        {
            $data['objects'] = [];
        }

        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}