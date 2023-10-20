<?php

namespace Liloi\Rune\Domain\Atoms;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getSummary()
 * @method void setSummary(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getTags()
 * @method void setTags(string $value)
 *
 * @method string getTs()
 * @method void setTs(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_atom');
    }

    public function parseSummary(): string
    {
        return Parser::parseString($this->getSummary());
    }

    public function parseProgram(): string
    {
        return Parser::parseString($this->getProgram());
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getDataParse(): array
    {
        return json_decode($this->getData(), true);
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function remove(): void
    {
        Manager::remove($this);
    }

    public function getUrl(): string
    {
        return Manager::ATOMtoURL($this->getKey());
    }

    public function isPublished(): bool
    {
        return $this->getStatus() == Statuses::PUBLISHED;
    }

    public function getSeeds(): string
    {
        $rid_full = $this->getKey();
        $rid = explode(':', $rid_full);

        $seeds = [];

        while(count($rid) > 0)
        {
            $rid_seed = implode(':', $rid);

            if($rid_seed == $rid_full)
            {
                $seed = ucfirst(str_replace('-', ' ', end($rid)));
            }
            else
            {
                $seed = sprintf(
                    '<a href="%s">%s</a>',
                    Manager::ATOMtoURL($rid_seed),
                    ucfirst(str_replace('-', ' ', end($rid)))
                );
            }

            array_unshift($seeds, $seed);
            array_pop($rid);
        }

        return implode(' &#9654; ', $seeds);
    }

    public function getTile(): string
    {
        return sprintf('<a href="%s">%s</a>', $this->getUrl(), $this->getTitle());
    }
}