<?php

namespace VehiclePark\Vehicle;

use Exception;
use VehiclePark\Color\Color;
use VehiclePark\Interface\CalculationSpeed;

/**
 * apstraktna klasa u kojoj sam definisao sve atribute i metode koji su zajednicki za sva vozila i implementira interfase gde se cuva metoda za proracun brzine
 */
abstract class Vehicle implements CalculationSpeed
{
    //definisao sam atribute po izboru i definisao im koji su tip podatka
    protected string $id;
    protected string $brand;
    protected string $model;
    protected object $color;
    protected int $yearOfManufacture;
    protected float $travelTime;
    protected int $distance;
    //generisao sam metode getter i setter za sve atribute i odradio odredjene validacije prilikom njihovog setovanja
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * @param string $id
     * @throws Exception
     */
    public function setId(string $id): void
    {
        if (empty($id)){
            throw new Exception("Vehicle id cannot be empty");
        }
        $this->id = $id;
    }
    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }
    /**
     * @param string $brand
     * @throws Exception
     */
    public function setBrand(string $brand): void
    {
        if (empty($brand)){
            throw new Exception("Vehicle brand name cannot be empty");
        }
        $this->brand = $brand;
    }
    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @throws Exception
     */
    public function setModel(string $model): void
    {
        if (empty($model)){
            throw new Exception("Vehicle model name cannot be empty");
        }
        $this->model = $model;
    }
    public function getColor(): object
    {
        return $this->color;
    }
    //odradio sam validaciju da $color mora biti instanca klase Color
    public function setColor(Color $color): void
    {
        $this->color = $color;
    }
    /**
     * @return int
     */
    public function getYearOfManufacture(): int
    {
        return $this->yearOfManufacture;
    }
    /**
     * @param int $yearOfManufacture
     * @throws Exception
     * validirao sam da godiste mora biti izmedju 2000 i 2025 cime sam ujedno postigao da mora unos biti cetvorocifren
     */
    public function setYearOfManufacture(int $yearOfManufacture): void
    {
        if ($yearOfManufacture < 2000 || $yearOfManufacture > 2025){
            throw new Exception("Vehicle year of manufacture must be between 2000 and 2025");
        }
        $this->yearOfManufacture = $yearOfManufacture;
    }
    public function getTravelTime(): float
    {
        return $this->travelTime;
    }
    /**
     * @throws Exception
     * travelTime ima float vrednost koja predstavlja sate provedene u prevozenju
     */
    public function setTravelTime(float $travelTime): void
    {
        if ($travelTime < 0){
            throw new Exception("Vehicle travel time must be positive number");
        }
        $this->travelTime = $travelTime;
    }
    public function getDistance(): int
    {
        return $this->distance;
    }
    /**
     * @throws Exception
     */
    public function setDistance(int $distance): void
    {
        if ($distance < 0){
            throw new Exception("Vehicle distance must be positive number");
        }
        $this->distance = $distance;
    }
    //metoda za prosto izracunavanje brzine deljenjem predjenog puta kroz vreme
    public function speedCalculation(): float|int
    {
        return round($this->getDistance() / $this->getTravelTime(), 2);
    }
    /**
     * @throws Exception
     */
    public function __construct(array $dataOfVehicle = [])
    {
        if (isset($dataOfVehicle['id'])) {
            $this->setId($dataOfVehicle['id']);
        }
        if (isset($dataOfVehicle['brand'])) {
            $this->setBrand($dataOfVehicle['brand']);
        }
        if (isset($dataOfVehicle['model'])) {
            $this->setModel($dataOfVehicle['model']);
        }
        if (isset($dataOfVehicle['color'])) {
            $this->setColor($dataOfVehicle['color']);
        }
        if (isset($dataOfVehicle['yearOfManufacture'])) {
            $this->setYearOfManufacture($dataOfVehicle['yearOfManufacture']);
        }
        if (isset($dataOfVehicle['travelTime'])) {
            $this->setTravelTime($dataOfVehicle['travelTime']);
        }
        if (isset($dataOfVehicle['distance'])) {
            $this->setDistance($dataOfVehicle['distance']);
        }
    }

}