<?php

namespace Liloi\Rune\Domain\Databank;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getSummary()
 * @method void setSummary(string $value)
 *
 * @method string getMap()
 * @method void setMap(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('rid');
    }

    public function parseSummary(): string
    {
        return Parser::parseString($this->getSummary());
    }

    public function parseMap(): string
    {
        return Parser::parseString($this->getMap());
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getPath(): string
    {
        return Manager::RIDtoURL($this->getKey());
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
                    Manager::RIDtoURL($rid_seed),
                    ucfirst(str_replace('-', ' ', end($rid)))
                );
            }

            array_unshift($seeds, $seed);
            array_pop($rid);
        }

        return implode(' &#9654; ', $seeds);
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }
}