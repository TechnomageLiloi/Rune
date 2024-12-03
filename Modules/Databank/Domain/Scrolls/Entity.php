<?php

namespace Liloi\Rune\Modules\Databank\Domain\Scrolls;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * Scroll entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getScroll()
 * @method void setScroll(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_scroll');
    }

    public function getAtom(): string
    {
        return $this->getField('key_atom');
    }

    public function setAtom(string $atom): void
    {
        $this->setField('key_atom', $atom);
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function parseScroll(): string
    {
        return Parser::parseString($this->getScroll());
    }
}