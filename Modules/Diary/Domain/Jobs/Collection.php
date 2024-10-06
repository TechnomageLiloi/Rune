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

        /** @var Entity $job */
        foreach($this as $job)
        {
            if($job->getStatus() != Statuses::SUCCESS)
            {
                continue;
            }

            $karma += $job->getKarma();
        }

        return $karma;
    }

    public function getByHour(): array
    {
        $day = [];

        for ($i=0;$i<24;$i++)
        {
            $day[$i] = [];
        }

        foreach ($this as $job)
        {
            $day[$job->getHour()][] = $job;
        }

        return $day;
    }
}