<?php

namespace VehiclePark\VehiclePark;

use Exception;
use VehiclePark\Interfaces\CalculationFuel;
use VehiclePark\Interfaces\CalculationSpeed;
use VehiclePark\Vehicle\Bike;
use VehiclePark\Vehicle\Car;
use VehiclePark\Vehicle\Motobike;

/**
 * klasa koja sluzi za smestanje svih vozila u svoj niz $vehicles
 */
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
    //prosecna brzina za sva vozila instance Bike
    //zbog razlicitih tipova vozila i mogucih brzina, razdvojio sam posebne metode za procacun brzine za svaki tip
    public function averageSpeedCalculationBike(): float|int
    {
        $count = 0;
        $fullSpeedBike = 0;
        foreach ($this->vehicles as $vehicle) {
            if ($vehicle instanceof Bike) {
                $count++;
                $fullSpeedBike += $vehicle->speedCalculation();
            }
        }
        return round($fullSpeedBike / $count, 2);
    }
    //prosecna brzina za sva vozila instance MotoBike
    public function averageSpeedCalculationMotobike(): float|int
    {
        $count = 0;
        $fullSpeedMotobike = 0;
        foreach ($this->vehicles as $vehicle) {
            if ($vehicle instanceof Motobike) {
                $count++;
                $fullSpeedMotobike += $vehicle->speedCalculation();
            }
        }
        return round($fullSpeedMotobike / $count, 2);
    }
    //prosecna brzina za sva vozila instance Car
    public function averageSpeedCalculationCar(): float|int
    {
        $count = 0;
        $fullSpeedCar = 0;
        foreach ($this->vehicles as $vehicle) {
            if ($vehicle instanceof Car) {
                $count++;
                $fullSpeedCar += $vehicle->speedCalculation();
            }
        }
        return round($fullSpeedCar / $count, 2);
    }
    //ukupna cena potrosenog goriva za vozila koja trose (Car i Motobike)
    public function totalFuelPriceCalculation(): float|int
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
    //metoda za sortiranje vozila po kategorijama Car, Motobike, Bike
    //dodatna funkcionalnost koja pomaze u preglednosti podataka
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