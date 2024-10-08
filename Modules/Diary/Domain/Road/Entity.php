<?php

namespace Liloi\Rune\Modules\Diary\Domain\Road;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getSummary()
 * @method void setSummary(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_step');
    }

    public function parse(): string
    {
        return Parser::parseString($this->getSummary());
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getStep(): string
    {
        return date('Y F j (D) - g:i a', strtotime($this->getKey()));
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }
}