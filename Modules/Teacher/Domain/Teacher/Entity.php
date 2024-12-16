<?php

namespace Liloi\Rune\Modules\Maps\Domain\Teacher;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTeacher()
 * @method void setTeacher(string $value)
 *
 * @method string getDialog()
 * @method void setDialog(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_dialog');
    }

    /**
     * Save question to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }
}