<?php

namespace Liloi\Rune\Modules\Journal\Domain\Jobs;

class Statuses
{
    public const TODO = 1;
    public const SUCCESS = 2;
    public const FAILURE = 3;

    public static $list = [
        self::TODO => 'To Do',
        self::SUCCESS => 'Success',
        self::FAILURE => 'Failure',
    ];
}