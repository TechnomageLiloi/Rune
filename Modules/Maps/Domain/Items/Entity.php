<?php

namespace Liloi\Rune\Modules\Maps\Domain\Items;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getDescription()
 * @method void setDescription(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getX()
 * @method void setX(string $value)
 *
 * @method string getY()
 * @method void setY(string $value)
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
    public function save(): self
    {
        Manager::save($this);
        return $this;
    }

    /**
     * Save question to database.
     */
    public function drop($RID, $x, $y): self
    {
        Manager::drop($this, $RID, $x, $y);
        return $this;
    }
}