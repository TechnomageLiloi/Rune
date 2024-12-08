<?php

namespace Liloi\Rune\Modules\Journal\Domain\Jobs;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getGoal()
 * @method void setGoal(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_day');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getHour(): int
    {
        return (int)$this->getField('key_hour');
    }

    public function getQuarter(): int
    {
        return (int)$this->getField('key_quarter');
    }
}