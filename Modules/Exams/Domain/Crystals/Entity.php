<?php

namespace Liloi\Rune\Modules\Exams\Domain\Crystals;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * Crystal's entity.
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
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

    public function getKeyOpponent(): string
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

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getElement(string $key)
    {
        $data = json_decode($this->getData(), JSON_UNESCAPED_UNICODE);

        return $data[$key];
    }

    public function getDate(): string
    {
        return date('Y-m-d', strtolower($this->getKey()));
    }

    public function getHour(): int
    {
        return (int)date('H', strtolower($this->getKey()));
    }

    public function getQuarter(): int
    {
        $minutes = (int)date('i', strtolower($this->getKey()));

        if($minutes >= 0 && $minutes < 15)
        {
            return 1;
        }

        if($minutes >= 15 && $minutes < 30)
        {
            return 2;
        }

        if($minutes >= 30 && $minutes < 45)
        {
            return 3;
        }

        return 4;
    }
}