<?php

namespace Liloi\Rune\Modules\Levels\Domain\Goals;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_goal');
    }

    public function getKeyQuest(): string
    {
        return $this->getField('key_quest');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function parse(): string
    {
        return Parser::parseString($this->getTitle());
    }

    public function getTimestamp(): string
    {
        return date('Y-m-d g:i a', strtotime($this->getKey()));
    }
}