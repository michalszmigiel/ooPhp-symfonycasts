<?php

namespace Service;

interface IShipStorage
{
    /**
     * Returns an array of ship arrays, incl. keys id, name, weaponPower, def.
     * @return array
     */
    public function fetchAllShipsData();

    /**
     * @param $id
     * @return array
     */
    public function fetchSingleShipData($id);
}