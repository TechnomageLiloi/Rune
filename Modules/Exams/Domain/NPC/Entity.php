<?php

namespace Liloi\Rune\Modules\Exams\Domain\NPC;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getDescription()
 * @method void setDescription(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_npc');
    }

    public function getRID(): string
    {
        return $this->getField('rid');
    }

    public function setRID(string $RID): void
    {
        $this->setField('rid', $RID);
    }

    public function getParse(): string
    {
        return Parser::parseString($this->getDescription());
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
}