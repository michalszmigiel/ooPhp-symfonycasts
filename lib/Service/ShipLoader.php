<?php


class ShipLoader
{
    private ?PDO $pdo = null;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return Ship[]
     */
    public function getShips()
    {
        $shipsData = $this->queryForShips();

        $ships = [];

        foreach ($shipsData as $shipData)
        {
            $ships[] = $this->createShipFromData($shipData);
        }

        return $ships;
    }

    /**
     * @param array $shipData
     * @return Ship
     */
    private function createShipFromData(array $shipData)
    {
        if($shipData['team'] == 'rebel')
        {
            $ship = new RebelShip($shipData['name']);
        }
        else
        {
            $ship = new Ship($shipData['name']);
        }

        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setJediFactor($shipData['jedi_factor']);
        $ship->setStrength($shipData['strength']);

        return $ship;
    }

    /**
     * @param $id
     * @return Ship|null
     */
    public function findOneById($id)
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare("SELECT * FROM ship WHERE id = :id");
        $statement->execute(array('id'=>$id));
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);

        if(!$shipArray)
        {
            return null;
        }

        return $this->createShipFromData($shipArray);
    }

    /**
     * @return Ship[]
     */
    private function queryForShips()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare("SELECT * FROM ship");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return PDO
     */
    private function getPDO()
    {
        return $this->pdo;
    }
}