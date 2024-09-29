<?php

namespace Liloi\Rune\Modules\Diary\Domain\Jobs;

use Liloi\Tools\Collection as AbstractCollection;

/**
 * @todo: add tests
 * @todo: add docs
 * @package Engine\Domain\Exercise
 */
class Collection extends AbstractCollection
{
    public function getKarma(): int
    {
        $karma = 0;

        foreach($this as $job)
        {
            $karma += $job->getKarma();
        }

        return $karma;
    }
}