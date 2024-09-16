<?php

namespace Liloi\Rune\Modules\Diary\Domain\Jobs;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_job');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getStep(): string
    {
        return date('g:i a', strtotime($this->getKey()));
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }
}