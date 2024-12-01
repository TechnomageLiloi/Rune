<?php

namespace Liloi\Rune\Modules\Business\Domain\Imperials;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getCredits()
 * @method void setCredits(string $value)
 *
 * @method string getMul()
 * @method void setMul(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_imperial');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getImperials(): float
    {
        return (float)$this->getMul() * (float)$this->getCredits();
    }
}