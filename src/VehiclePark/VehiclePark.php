<?php

namespace VehiclePark\VehiclePark;

use Exception;
use VehiclePark\Vehicle\Vehicle;

class VehiclePark
{
    protected array $vehicles = [];

    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): VehiclePark
    {
        $this->vehicles[] = $vehicle;
        return $this;
    }

    public function averageSpeedCalculation(): float|int
    {
        $fullSpeed = 0;
        foreach ($this->vehicles as $vehicle) {
            $fullSpeed += $vehicle->speedCalculation();
        }
        return $fullSpeed / count($this->vehicles);
    }
    public function averageFuelPriceCalculation(): float|int
    {
        $fullFuelPrice = 0;
        foreach ($this->vehicles as $vehicle) {
            $fullFuelPrice += $vehicle->consumedFuelPrice();
        }
        return $fullFuelPrice / count($this->vehicles);
    }
    public function __construct()
    {

    }
}