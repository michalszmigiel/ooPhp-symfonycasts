<?php


class RebelShip extends Ship
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
        if($useShortFormat)
        {
            return sprintf(
                "%s: %s/%s/%s (Rebel)",
                $this->getName(),
                $this->getWeaponPower(),
                $this->getJediFactor(),
                $this->getStrength()
            );
        }
        else
        {
            return sprintf(
                "%s: w:%s, j:%s, s:%s (Rebel)",
                $this->getName(),
                $this->getWeaponPower(),
                $this->getJediFactor(),
                $this->getStrength()
            );
        }

    }

}