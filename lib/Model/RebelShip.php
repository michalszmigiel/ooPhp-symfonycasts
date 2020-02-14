<?php

namespace Model;

class RebelShip extends AbstractShip
{
    /**
     * @return mixed
     */
    public function getFavouriteJedi()
    {
        $coolJedi = ['Yoda', 'Ben Kenobi'];
        $key = array_rand($coolJedi);

        return $coolJedi[$key];
    }

    /**
     * @return string
     */
    public function getType()
    {
        return "Rebel";
    }

    /**
     * @return bool
     */
    public function isFunctional(): bool
    {
        return true;
    }

    public function getNameAndSpecs($useShortFormat = false)
    {
        $nameAndSpecsToReturn = parent::getNameAndSpecs($useShortFormat);
        $nameAndSpecsToReturn .= ' (Rebel)';

        return $nameAndSpecsToReturn;
    }

    public function getJediFactor(): int
    {
        return rand(10, 30);
    }

}