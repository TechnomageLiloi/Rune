<?php

namespace Liloi\Rune\Modules\Exams\Domain\Quests;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * Quest's entity.
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
 * @method string getDialog()
 * @method void setDialog(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
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

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    public function getParseDialog(): string
    {
        return Parser::parseString($this->getDialog());
    }

    public function getElement(string $key)
    {
        $data = json_decode($this->getProgram(), JSON_UNESCAPED_UNICODE);

        return $data[$key];
    }

    public function getID(): string
    {
        $id = $this->getKeyMap() . '-' . $this->getKey();
        return str_replace([':',' ','--'],['-','-','-'], $id);
    }
}