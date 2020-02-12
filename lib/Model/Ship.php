<?php


class Ship
{
    private int $id;
    private string $name;
    private int $weaponPower = 0;
    private int $jediFactor = 0;
    private int $strength = 0;
    private bool $underRepair;


    public function __construct($name)
    {
        $this->name = $name;
        $this->underRepair = mt_rand(1, 100) < 30;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return bool
     */
    public function isFunctional(): bool
    {
        return !$this->underRepair;
    }

    /**
     * @return int
     */
    public function getWeaponPower(): int
    {
        return $this->weaponPower;
    }

    /**
     * @param int $weaponPower
     */
    public function setWeaponPower(int $weaponPower): void
    {
        $this->weaponPower = $weaponPower;
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     */
    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }

    public function getNameAndSpecs($useShortFormat = false)
    {
        if($useShortFormat)
        {
            return sprintf(
                "%s: %s/%s/%s",
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        }
        else
        {
            return sprintf(
                "%s: w:%s, j:%s, s:%s",
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        }

    }

    public function doesGivenShipHaveMoreStrength($givenShip)
    {
        return $givenShip->strength > $this->strength;
    }

}