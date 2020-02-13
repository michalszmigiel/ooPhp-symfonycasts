<?php


class BattleResult
{
    private bool $usedJediPowers;
    private ?AbstractShip $losingShip = null;
    private ?AbstractShip $winningShip = null;

    public function __construct($usedJediPowers, AbstractShip $losingShip, AbstractShip $winningShip)
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
     * @return AbstractShip | null
     */
    public function getLosingShip()
    {
        return $this->losingShip;
    }

    /**
     * @return AbstractShip | null
     */
    public function getWinningShip()
    {
        return $this->winningShip;
    }

}