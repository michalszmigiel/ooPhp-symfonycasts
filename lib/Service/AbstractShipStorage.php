<?php


abstract class AbstractShipStorage
{
    abstract function fetchAllShipsData();
    abstract public function fetchSingleShipData($id);
}