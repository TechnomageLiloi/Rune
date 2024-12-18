<?php

namespace Liloi\Rune\Modules\Maps\Domain\Items;

use Liloi\Tools\Collection as AbstractCollection;

/**
 * @todo: add tests
 * Question's collection.
 *
 * @package Engine\Domain\Exercise
 */
class Collection extends AbstractCollection
{
    public function toArray(): array
    {
        $collection = [];

        /** @var Entity $entity */
        foreach ($this as $entity)
        {
            if(!isset($collection[$entity->getY()]))
            {
                $collection[$entity->getY()] = [];
            }

            if(!isset($collection[$entity->getY()][$entity->getX()]))
            {
                $collection[$entity->getY()][$entity->getX()] = [];
            }

            $collection[$entity->getY()][$entity->getX()][] = $entity->get();
        }

        return $collection;
    }
}