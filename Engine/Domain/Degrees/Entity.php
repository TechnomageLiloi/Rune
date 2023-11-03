<?php

namespace Liloi\Rune\Domain\Degrees;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getUid()
 * @method void setUid(string $value)
 *
 * @method string getPlan()
 * @method void setPlan(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_degree');
    }

    public function parse(): string
    {
        return Parser::parseString($this->getPlan());
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function remove(): void
    {
        $this->setStatus(Statuses::TODO);
        $this->save();
    }

    public function getStatusCaption(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getStatusClass(): string
    {
        // @todo: string to class
        $status = strtolower($this->getStatusCaption());
        return str_replace(' ', '-', $status);
    }
}