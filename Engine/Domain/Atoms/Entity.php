<?php

namespace Liloi\Rune\Domain\Atoms;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 *
 * @method string getWiki()
 * @method void setWiki(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_atom');
    }

    public function parseProgram(): string
    {
        return Parser::parseString($this->getProgram());
    }

    public function parseWiki(): string
    {
        return Parser::parseString($this->getWiki());
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getPath(): string
    {
        return Manager::ATOMtoURL($this->getKey());
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

    public function getScripts(): string
    {
        $www = '/Pool' . Manager::ATOMtoURL($this->getKey());
        $dir = ROOT_DIR . $www;

        $data = [];

        if(file_exists($dir . '/Index.js'))
        {
            $data[] = sprintf('<script src="%s/Index.js"></script>', $www);
        }

        return implode('', $data);
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
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
}