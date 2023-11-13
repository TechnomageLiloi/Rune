<?php

namespace Liloi\Rune\Domain\Tickets;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getDt()
 * @method void setDt($value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_ticket');
    }

    public function getProjectKey(): string
    {
        return $this->getField('key_project');
    }

    public function save(): void
    {
        Manager::save($this);
    }
}