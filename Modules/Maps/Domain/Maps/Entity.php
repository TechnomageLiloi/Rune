<?php

namespace Liloi\Rune\Modules\Maps\Domain\Maps;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getMaps()
 * @method void setMaps(string $value)
 *
 * @method string getObjects()
 * @method void setObjects(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_npc');
    }

    public function getKeyAtom(): string
    {
        return $this->getField('key_atom');
    }

    public function setKeyAtom(string $key_atom): void
    {
        $this->setField('key_atom', $key_atom);
    }

    public function getParse(): string
    {
        return Parser::parseString($this->getMaps());
    }

    public function getElement(string $key)
    {
        $data = json_decode($this->getObjects(), JSON_UNESCAPED_UNICODE);

        return isset($data[$key]) ? $data[$key] : null;
    }

    /**
     * Save question to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }
}