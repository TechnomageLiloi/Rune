<?php

namespace Liloi\Rune\Modules\Maps\API\Show;

use Liloi\Rune\Domain\Atoms\Entity as AtomsEntity;
use Liloi\Rune\Modules\Exams\Domain\Inventory\Collection as InventoryCollection;
use Liloi\Rune\Modules\Exams\Domain\Inventory\Entity as InventoryEntity;
use Liloi\Rune\Domain\Artifacts\Collection as ArtifactsCollection;
use Liloi\Rune\Domain\Artifacts\Entity as ArtifactsEntity;
use Liloi\Rune\Modules\Maps\Domain\NPCs\Collection as NPCsCollection;

class Map
{
    private ?AtomsEntity $entity = null;

    private ?InventoryCollection $inventories = null;

    private ?ArtifactsCollection $artifacts = null;

    private ?NPCsCollection $NPCs = null;

    public function __construct(
        AtomsEntity $entity,
        InventoryCollection $inventories,
        ArtifactsCollection $artifacts,
        NPCsCollection $NPCs
    ) {
        $this->entity = $entity;
        $this->inventories = $inventories;
        $this->artifacts = $artifacts;
        $this->NPCs = $NPCs;
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

        /** @var InventoryEntity $entity */
        foreach($this->inventories as $entity)
        {
            $data['objects'][] = [
                'x' => (int)$entity->getElement('x'),
                'y' => (int)$entity->getElement('y'),
                'key' => $entity->getKey(),
                'entity' => $entity->get(),
                'type' => 'inventory'
            ];
        }

        /** @var ArtifactsEntity $entity */
        foreach($this->artifacts as $entity)
        {
            $data['objects'][] = [
                'x' => (int)$entity->getElement('x'),
                'y' => (int)$entity->getElement('y'),
                'key' => $entity->getKey(),
                'entity' => $entity->get(),
                'type' => 'artifact'
            ];
        }

        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}