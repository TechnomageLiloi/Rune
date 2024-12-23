<?php

namespace Liloi\Rune\Modules\Exams\Domain\Opponents;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * Opponent's entity.
 *
 * @method string getSpecie()
 * @method void setSpecie(string $value)
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getTheory()
 * @method void setTheory(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_opponent');
    }

    public function getRID(): ?string
    {
        return $this->getField('rid');
    }

    public function setRID(?string $RID): void
    {
        $this->setField('rid', $RID);
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getSpecieTitle(): string
    {
        return Species::$list[$this->getSpecie()];
    }

    public function getSpecieStart(): string
    {
        return Species::$start[$this->getSpecie()];
    }

    public function getSpecieFinish(): string
    {
        return Species::$finish[$this->getSpecie()];
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    public function getParseTheory(): string
    {
        return Parser::parseString($this->getTheory());
    }

    public function getElement(string $key)
    {
        $data = json_decode($this->getProgram(), JSON_UNESCAPED_UNICODE);

        return $data[$key];
    }

    public function getID(): string
    {
        return $this->getRID() . '-' . $this->getKey();
    }
}