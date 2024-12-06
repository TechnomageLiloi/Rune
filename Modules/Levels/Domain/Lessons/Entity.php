<?php

namespace Liloi\Rune\Modules\Levels\Domain\Lessons;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_lesson');
    }

    public function getKeyLevel(): string
    {
        return $this->getField('key_level');
    }

    public function setKeyLevel(string $keyLevel): void
    {
        $this->setField('key_level', $keyLevel);
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getProgramParse(): string
    {
        return Parser::parseString($this->getProgram());
    }
}