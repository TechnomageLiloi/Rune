<?php

namespace Liloi\Rune\Domain\Maps;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getMap()
 * @method void setMap(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 *
 * @method string getDt()
 * @method void setDt(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_map');
    }

    public function parseMap(): string
    {
        return Parser::parseString($this->getMap());
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getDataElement(string $key)
    {
        $data = (array)json_decode($this->getData(), true, 512, JSON_UNESCAPED_UNICODE);

        if(!array_key_exists($key, $data))
        {
            return '';
        }

        return $data[$key];
    }

    public function setDataElement(string $key, $value): void
    {
        $data = (array)json_decode($this->getData(), true, 512, JSON_UNESCAPED_UNICODE);

        $data[$key] = $value;

        $this->setData(json_encode($data));
    }

    /**
     * @return string
     * @todo Move JSON decode to more abstract layer.
     */
    public function getDataBeauty(): string
    {
        $data = (array)json_decode($this->getData());
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function getTimestamp(string $format = "Y-m-d H:i:s")
    {
        return date($format, strtotime($this->getDt()));
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

    public function getPath(): string
    {
        return Manager::ATOMtoURL($this->getKey());
    }
}