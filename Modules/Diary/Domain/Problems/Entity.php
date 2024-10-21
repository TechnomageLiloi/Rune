<?php

namespace Liloi\Rune\Modules\Diary\Domain\Problems;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getSummary()
 * @method void setSummary(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_problem');
    }

    public function parse(): string
    {
        return Parser::parseString($this->getSummary());
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function remove(): void
    {
        Manager::remove($this);
    }

    public function getStep(): string
    {
        return date('Y F j (D) - g:i a', strtotime($this->getKey()));
    }
}