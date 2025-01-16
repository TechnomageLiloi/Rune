<?php

namespace Liloi\Rune\Modules\Journal\Domain\Atoms;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getGoal()
 * @method void setGoal(string $value)
 *
 * @method string getXp()
 * @method void setXp(string $value)
 *
 * @method string getStart()
 * @method void setStart(string $value)
 *
 * @method string getFinish()
 * @method void setFinish(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKeyDay(): string
    {
        return $this->getField('key_day');
    }

    public function getKeyAtom(): string
    {
        return $this->getField('key_atom');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getStatusClass(): string
    {
        return strtolower(str_replace(' ', '-', $this->getStatusTitle()));
    }
}