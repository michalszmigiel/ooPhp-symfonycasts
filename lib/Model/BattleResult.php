<?php


class BattleResult
{
    private bool $usedJediPowers;
    private ?Ship $losingShip = null;
    private ?Ship $winningShip = null;

    public function __construct($usedJediPowers, Ship $losingShip, Ship $winningShip)
    {

        $this->usedJediPowers = $usedJediPowers;
        $this->losingShip = $losingShip;
        $this->winningShip = $winningShip;
    }

    public function isThereAWinner()
    {
        return $this->getWinningShip() !== null;
    }

    /**
     * @return bool
     */
    public function wereJediPowersUsed()
    {
        return $this->usedJediPowers;
    }

    /**
     * @return Ship | null
     */
    public function getLosingShip()
    {
        return $this->losingShip;
    }

    /**
     * @return Ship | null
     */
    public function getWinningShip()
    {
        return $this->winningShip;
    }

}