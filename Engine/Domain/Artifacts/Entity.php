<?php

namespace Liloi\Rune\Domain\Artifacts;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getDescription()
 * @method void setDescription(string $value)
 *
 * @method string getGlobal()
 * @method void setGlobal(string $value)
 *
 * @method string getLocal()
 * @method void setLocal(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_artifact');
    }

    public function getRID(): string
    {
        return $this->getField('key_atom');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getTimestampBeauty(): string
    {
        return date('Y F j (D) - g:i a', strtotime($this->getKey()));
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    public function getElement(string $key)
    {
        $data = json_decode($this->getData(), JSON_UNESCAPED_UNICODE);

        return isset($data[$key]) ? $data[$key] : null;
    }
}