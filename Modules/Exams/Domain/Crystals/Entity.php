<?php

namespace Liloi\Rune\Modules\Exams\Domain\Crystals;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * Question's entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getTheory()
 * @method void setTheory(string $value)
 *
 * @method string getTags()
 * @method void setTags(string $value)
 *
 * @method string getDt()
 * @method void setDt(string $value)
 *
 * @method string getDone()
 * @method void setDone(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_crystal');
    }

    public function getRID(): ?string
    {
        return $this->getField('rid');
    }

    public function setRID(?string $RID): void
    {
        $this->setField('rid', $RID);
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getStatusClass(): string
    {
        // @todo: string to class
        $status = strtolower($this->getStatusCaption());
        return str_replace(' ', '-', $status);
    }

    public function getParse(): string
    {
        return Parser::parseString($this->getProgram());
    }

    public function getElement(string $key)
    {
        $data = json_decode($this->getProgram(), JSON_UNESCAPED_UNICODE);

        return $data[$key];
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
        $this->setStatus(Statuses::OBSOLETE);
        $this->save();
    }

    public function getParseTheory(): string
    {
        return Parser::parseString($this->getTheory());
    }

    public function getID(): string
    {
        return str_replace([':',' '],['-','-'], $this->getKey());
    }

    public function getDoneClass(): string
    {
        return $this->getDone() ? 'done' : 'not-done';
    }
}