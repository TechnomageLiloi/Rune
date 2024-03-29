<?php

namespace Liloi\Rune\Domain\Tickets;

use Liloi\Tools\Entity as AbstractEntity;

/**
 * Tickets entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStart()
 * @method void setStart(string $value)
 *
 * @method string getFinish()
 * @method void setFinish(string $value)
 *
 * @method string getPower()
 * @method void setPower(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 */
class Entity extends AbstractEntity
{
    /**
     * Get problem key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getField('key_ticket');
    }

    public function getKeyAtom(): string
    {
        return $this->getField('key_atom');
    }

    public function setKeyAtom(string $key_atom): void
    {
        $this->setField('key_atom', $key_atom);
    }

    /**
     * Get lesson key.
     *
     * @return string
     */
    public function getKeyLesson(): string
    {
        return $this->getField('key_lesson');
    }

    /**
     * Save problem to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }

    /**
     * Remove problem from database.
     */
    public function remove(): void
    {
        Manager::remove($this);
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    /**
     * Gets ticket karma.
     *
     * @deprecated Use {@link Entity::getPower()}.
     * @return string
     */
    public function getKarma(): string
    {
        return $this->getPower();
    }

    /**
     * Is problem in hand?
     *
     * @return bool `true` if so, `false` otherwise.
     */
    public function isInHand(): bool
    {
        return $this->getStatus() === Statuses::IN_HAND;
    }

    /**
     * Gets title with flags.
     *
     * @return string
     */
    public function getTitleWithFlags(): string
    {
        $title = $this->getTitle();

        if($title[0] !== '[')
        {
            return $title;
        }

        $flags = substr($title, 1, strpos($title, ']') - 1);
        $listFlags = [];

        foreach (explode(' ', $flags) as $flag)
        {
            $listFlags[] = '<span class="flag">' . $flag . '</span>';
        }

        $title = str_replace(substr($title, 0, strpos($title, ']') + 1), '', $title);

        return implode('', $listFlags) . $title;
    }
}