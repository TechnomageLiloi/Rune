<?php

namespace Liloi\Rune\Modules\News\Domain\Topics;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;
use Liloi\Rune\Domain\Atoms\Manager as AtomsManager;

/**
 * Question's entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getSummary()
 * @method void setSummary(string $value)
 *
 * @method string getTags()
 * @method void setTags(string $value)
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
        return $this->getField('key_topic');
    }

    public function getKeyAtom(): string
    {
        return $this->getField('key_atom');
    }

    public function setKeyAtom(string $keyAtom): void
    {
        $this->setField('key_atom', $keyAtom);
    }

    public function getLink(): string
    {
        return AtomsManager::ATOMtoURL($this->getKeyAtom());
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

    public function parse(): string
    {
        return Parser::parseString($this->getSummary());
    }

    public function getElement(string $key)
    {
        $data = json_decode($this->getData(), JSON_UNESCAPED_UNICODE);

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
}