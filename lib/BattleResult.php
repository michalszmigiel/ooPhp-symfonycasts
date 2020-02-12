<?php


class BattleResult
{
    private $usedJediPowers;
    private $losingShip;
    private $winningShip;

    public function __construct($usedJediPowers, Ship $losingShip = null, Ship $winningShip = null)
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