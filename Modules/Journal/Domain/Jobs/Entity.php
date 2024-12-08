<?php

namespace Liloi\Rune\Modules\Journal\Domain\Jobs;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getProgram()
 * @method void setProgram(string $value)
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

    public function getProgramParse(): string
    {
        return Parser::parseString($this->getProgram());
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