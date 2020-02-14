<?php

namespace Model;

class Ship extends AbstractShip
{
    private int $jediFactor = 0;
    private bool $underRepair;

    public function __construct($name)
    {
        parent::__construct($name);
        $this->underRepair = mt_rand(1,100) < 30;
    }

    /**
     * @return int
     */
    public function getJediFactor(): int
    {
        return $this->jediFactor;
    }

    /**
     * @param int $jediFactor
     */
    public function setJediFactor(int $jediFactor): void
    {
        $this->jediFactor = $jediFactor;
    }

    /**
     * @return bool
     */
    public function isFunctional(): bool
    {
        return !$this->underRepair;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return "Empire";
    }
}