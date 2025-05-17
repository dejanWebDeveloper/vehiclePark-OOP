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
        return round($fullSpeed / count($this->vehicles), 2);
    }
    public function averageFuelPriceCalculation(): float|int
    {
        $fullFuelPrice = 0;
        foreach ($this->vehicles as $vehicle) {
            if (method_exists($vehicle, 'consumedFuelPrice')) {
                $fullFuelPrice += $vehicle->consumedFuelPrice();
            }else{
                $fullFuelPrice += 0;
            }

        }
        return $fullFuelPrice;
    }
    public function __construct()
    {

    }
}