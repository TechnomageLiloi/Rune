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
            $collection[$entity->getKey()] = $entity->get();
        }

        return $collection;
    }
}