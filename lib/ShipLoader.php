<?php


class ShipLoader
{
    private ?PDO $pdo = null;
    private string $dbDsn;
    private string $dbUser;
    private ?string $dbPass;

    public function __construct($dbDsn, $dbUser, $dbPass)
    {
        $this->dbDsn = $dbDsn;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
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
        $ship = new Ship($shipData['name']);
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
        if($this->pdo === null)
        {
            $pdo = new PDO($this->dbDsn,$this->dbUser, $this->dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->pdo = $pdo;
        }

        return $this->pdo;
    }
}