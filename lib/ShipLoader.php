<?php


class ShipLoader
{
    public function getShips()
    {
        $shipsData = $this->queryForShips();

        $ships = [];

        foreach ($shipsData as $shipData)
        {
            $ship = new Ship($shipData['name']);
            $ship->setWeaponPower($shipData['weapon_power']);
            $ship->setJediFactor($shipData['jedi_factor']);
            $ship->setStrength($shipData['strength']);
            $ships[] = $ship;
        }

        return $ships;
    }

    private function queryForShips()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=oo_battle','root', null);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo->prepare("SELECT * FROM ship");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}