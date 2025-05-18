<?php

namespace VehiclePark\VehiclePark;

use Exception;
use VehiclePark\Interface\CalculationFuel;
use VehiclePark\Interface\CalculationSpeed;
use VehiclePark\Vehicle\Bike;
use VehiclePark\Vehicle\Car;
use VehiclePark\Vehicle\Motobike;

class VehiclePark
{
    protected array $vehicles = [];

    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    public function addVehicle(CalculationFuel|CalculationSpeed $vehicle): VehiclePark
    {
        $this->vehicles[] = $vehicle;
        return $this;
    }

    public function setVehicles(array $vehicles): void
    {
        $this->vehicles = $vehicles;
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
    public function sortByType(): void
    {
        $vehicleParkCars = [];
        $vehicleParkMotobike = [];
        $vehicleParkBike = [];

        foreach ($this->getVehicles() as $vehicle) {
            if ($vehicle instanceof Car) {
                $vehicleParkCars[] = $vehicle;
            }
            if ($vehicle instanceof Bike) {
                $vehicleParkBike[] = $vehicle;
            }
            if ($vehicle instanceof Motobike) {
                $vehicleParkMotobike[] = $vehicle;
            }
        }
        $this->setVehicles(array_merge($vehicleParkCars, $vehicleParkMotobike, $vehicleParkBike));
    }
    public function __construct()
    {

    }
}