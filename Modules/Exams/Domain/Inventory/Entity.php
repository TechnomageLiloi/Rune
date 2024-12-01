<?php

namespace Liloi\Rune\Modules\Exams\Domain\Inventory;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getDt()
 * @method void setDt(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_item');
    }

    public function getKeyAtom(): string
    {
        return $this->getField('key_atom');
    }

    public function setKeyAtom(string $key_atom): void
    {
        $this->setField('key_atom', $key_atom);
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    public function getParse(): string
    {
        return Parser::parseString($this->getProgram());
    }

    public function getElement(string $key)
    {
        $data = json_decode($this->getData(), JSON_UNESCAPED_UNICODE);

        return isset($data[$key]) ? $data[$key] : null;
    }

    /**
     * Save question to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }

    /**
     * Set question's status as {@see Statuses::OBSOLETE} and save to database.
     */
    public function remove(): void
    {
        Manager::remove($this);
    }

    public function getParseTheory(): string
    {
        return Parser::parseString($this->getTheory());
    }
}