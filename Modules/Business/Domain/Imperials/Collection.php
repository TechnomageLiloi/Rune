<?php

namespace Liloi\Rune\Modules\Business\Domain\Imperials;

use Liloi\Tools\Collection as AbstractCollection;

/**
 * @package Engine\Domain\Exercise
 */
class Collection extends AbstractCollection
{
    public function getTotal(): float
    {
        $total = 0.0;

        /** @var Entity $entity */
        foreach ($this as $entity)
        {
            $total += $entity->getImperials();
        }

        return $total;
    }
}