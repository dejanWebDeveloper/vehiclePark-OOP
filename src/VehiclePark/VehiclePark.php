<?php

namespace VehiclePark\VehiclePark;

use Exception;
use VehiclePark\Vehicle\Vehicle;

class VehiclePark
{
protected $vehicles = [];
    public function getVehicles(): array
    {
        return $this->vehicles;
    }
    public function addVehicle(Vehicle $vehicle): VehiclePark
    {
        $this->vehicles[] = $vehicle;
        return $this;
    }
    public function __construct()
    {

    }
}