<?php

namespace Liloi\Rune\Domain\Atoms;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * Atoms entity.
 *
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
 * @method string getArticle()
 * @method void setArticle(string $value)
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
    /**
     * Gets unique key of atom.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getField('key_atom');
    }

    /**
     * Gets Stylo parse of summary.
     *
     * @return string
     */
    public function parseSummary(): string
    {
        return Parser::parseString($this->getSummary());
    }

    /**
     * Gets Stylo parse of program.
     *
     * @return string
     */
    public function parseProgram(): string
    {
        return Parser::parseString($this->getProgram());
    }

    /**
     * Gets Stylo parse of article.
     *
     * @return string
     */
    public function parseArticle(): string
    {
        return Parser::parseString($this->getArticle());
    }

    /**
     * Gets title of atom type.
     *
     * @return string
     */
    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    /**
     * Gets title of atom status.
     *
     * @return string
     */
    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getDataParse(): array
    {
        return json_decode($this->getData(), true);
    }

    public function getDataElement(string $key)
    {
        return $this->getDataParse()[$key];
    }

    public function isDataElement(string $key)
    {
        return isset($this->getDataParse()[$key]);
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
                    '<a href="%s" class="butn">%s</a>',
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
        $type = $this->getType();

        if($type == Types::LINK)
        {
            return sprintf('<a target="_blank" href="%s">%s</a> &diams; ', $this->getDataElement('link'), $this->getTitle())
                . sprintf('<a href="%s">Show Atom</a>', $this->getUrl());
        }

        if($type == Types::ARCHIVE)
        {
            return sprintf('<a target="_blank" href="%s">%s</a> &diams; ', $this->getDataElement('global'), $this->getTitle())
                . sprintf('<a href="%s">Show Atom</a>', $this->getUrl());
        }

        if($type == Types::GOOGLE_DOCUMENT)
        {
            $token = $this->getDataElement('token');
            return sprintf('%s (<a target="_blank" href="http://docs.google.com/document/d/%s/export?format=pdf">PDF</a>/<a target="_blank" href="http://docs.google.com/document/d/%s/export?format=epub">ePub</a>) &diams; ', $this->getTitle(), $token, $token)
                . sprintf('<a href="%s">Show Atom</a>', $this->getUrl());
        }

        if($type == Types::GOOGLE_SPREADSHEET)
        {
            $token = $this->getDataElement('token');
            return sprintf('%s (<a target="_blank" href="http://docs.google.com/spreadsheets/d/%s/export?format=pdf">PDF</a>/<a target="_blank" href="http://docs.google.com/spreadsheets/d/%s/export?format=xlsx">XLSX</a>) &diams; ', $this->getTitle(), $token, $token)
                . sprintf('<a href="%s">Show Atom</a>', $this->getUrl());
        }

        if($type == Types::FRAME)
        {
            return sprintf('<a href="javascript:void(0)" onclick="Rune.Types.Frame.show(\'%s\');">Frame</a> &diams; ', $this->getDataElement('link'))
                . sprintf('<a target="_blank" href="%s">New page</a> &diams; ', $this->getDataElement('link'))
                . sprintf('<a href="%s">Show Atom</a>', $this->getUrl());
        }

        return sprintf('<a href="%s">%s</a>', $this->getUrl(), $this->getTitle());
    }

    public function getTimestamp(): string
    {
        return date('Y-m-d H:i', strtotime($this->getTs()));
    }

    public function dump(): array
    {
        $f = function ($title, $description, $global, $local) {
            return [
                "title" => $title,
                "description" => $description,
                "type" => "file",
                "global" => $global,
                "local" => $local
            ];
        };

        $type = $this->getType();
        $local = $this->isDataElement('local') ? $this->getDataElement('local') : Manager::ATOMtoURL($this->getKey());

        $dump = [];

        if($type == Types::ARCHIVE)
        {
            $dump[] = $f($this->getTitle(), $this->getSummary(), $this->getDataElement('global'), $local);
        }

        if($type == Types::GOOGLE_DOCUMENT)
        {
            $token = $this->getDataElement('token');

            $dump[] = $f($this->getTitle(), $this->getSummary(), sprintf('http://docs.google.com/document/d/%s/export?format=pdf', $token), $local . '.pdf');
            $dump[] = $f($this->getTitle(), $this->getSummary(), sprintf('http://docs.google.com/document/d/%s/export?format=epub', $token), $local . '.epub');
            $dump[] = $f($this->getTitle(), $this->getSummary(), sprintf('http://docs.google.com/document/d/%s/export?format=docx', $token), $local . '.docx');
            $dump[] = $f($this->getTitle(), $this->getSummary(), sprintf('http://docs.google.com/document/d/%s/export?format=odt', $token), $local . '.odt');
        }

        if($type == Types::GOOGLE_SPREADSHEET)
        {
            $token = $this->getDataElement('token');

            $dump[] = $f($this->getTitle(), $this->getSummary(), sprintf('http://docs.google.com/spreadsheets/d/%s/export?format=pdf', $token), $local . '.pdf');
            $dump[] = $f($this->getTitle(), $this->getSummary(), sprintf('http://docs.google.com/spreadsheets/d/%s/export?format=csv', $token), $local . '.csv');
            $dump[] = $f($this->getTitle(), $this->getSummary(), sprintf('http://docs.google.com/spreadsheets/d/%s/export?format=tsv', $token), $local . '.tsv');
            $dump[] = $f($this->getTitle(), $this->getSummary(), sprintf('http://docs.google.com/spreadsheets/d/%s/export?format=xlsx', $token), $local . '.xlsx');
            $dump[] = $f($this->getTitle(), $this->getSummary(), sprintf('http://docs.google.com/spreadsheets/d/%s/export?format=ods', $token), $local . '.ods');
        }

        return $dump;
    }
}