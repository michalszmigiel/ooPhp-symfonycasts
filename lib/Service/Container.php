<?php

namespace Service;

class Container
{
    private array $configuration;
    private ?\PDO $pdo = null;
    private ?ShipLoader $shipLoader = null;
    private ?IShipStorage $shipStorage = null;
    private ?BattleManager $battleManager = null;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return \PDO
     */
    public function getPDO()
    {
        if($this->pdo === null)
        {
            $this->pdo = new \PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass'],
            );
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }


    /**
     * @return ShipLoader
     */
    public function getShipLoader()
    {
        if($this->shipLoader === null)
        {
            $this->shipLoader = new ShipLoader($this->getShipStorage());
        }

        return $this->shipLoader;
    }

    /**
     * @return IShipStorage
     */
    public function getShipStorage()
    {
        if($this->shipStorage === null)
        {
//            $this->shipStorage = new PdoShipStorage($this->getPDO());
            $this->shipStorage = new JsonFileShipStorage(__DIR__.'/../../resources/ships.json');
        }

        return $this->shipStorage;
    }

    /**
     * @return BattleManager
     */
    public function getBattleManager()
    {
        if ($this->battleManager === null) {
            $this->battleManager = new BattleManager();
        }

        return $this->battleManager;
    }
}