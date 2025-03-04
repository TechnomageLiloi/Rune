<?php

namespace Liloi\Rune\Modules\Exams\Domain\Crystals;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * Crystal's entity.
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_crystal');
    }

    public function getKeyQuest(): string
    {
        return $this->getField('key_quest');
    }

    public function getKeyMap(): ?string
    {
        return $this->getField('key_map');
    }

    public function setKeyMap(?string $key_map): void
    {
        $this->setField('key_map', $key_map);
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getElement(string $key)
    {
        $data = json_decode($this->getData(), JSON_UNESCAPED_UNICODE);

        return $data[$key];
    }

    public function getDate(): string
    {
        return date('Y-m-d', strtotime($this->getKey()));
    }
}