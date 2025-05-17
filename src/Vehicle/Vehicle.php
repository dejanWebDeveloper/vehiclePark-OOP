<?php

namespace VehiclePark\Vehicle;

use Exception;

abstract class Vehicle
{
    protected string $id;
    protected string $brand;
    protected string $model;
    protected int $yearOfManufacture;
    protected int $numberOfWheels;
    protected float $travelTime;
    protected int $distance;

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
     */
    public function setYearOfManufacture(int $yearOfManufacture): void
    {
        if ($yearOfManufacture < 2000 || $yearOfManufacture > 2025){
            throw new Exception("Vehicle year of manufacture must be between 2000 and 2025");
        }
        $this->yearOfManufacture = $yearOfManufacture;
    }
    /**
     * @return int
     */
    public function getNumberOfWheels(): int
    {
        return $this->numberOfWheels;
    }
    /**
     * @param int $numberOfWheels
     * @throws Exception
     */
    public function setNumberOfWheels(int $numberOfWheels): void
    {
        if ($numberOfWheels < 0 || $numberOfWheels > 4){
            throw new Exception("Vehicle number of wheels must be between 1 and 4");
        }
        $this->numberOfWheels = $numberOfWheels;
    }
    public function getTravelTime(): float
    {
        return $this->travelTime;
    }

    /**
     * @throws Exception
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
    //speed calculation for different types of vehicles
    public function speedCalculation(): float|int
    {
        return $this->distance / $this->travelTime;
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
        if (isset($dataOfVehicle['yearOfManufacture'])) {
            $this->setYearOfManufacture($dataOfVehicle['yearOfManufacture']);
        }
        if (isset($dataOfVehicle['numberOfWheels'])) {
            $this->setNumberOfWheels($dataOfVehicle['numberOfWheels']);
        }
        if (isset($dataOfVehicle['travelTime'])) {
            $this->setTravelTime($dataOfVehicle['travelTime']);
        }
        if (isset($dataOfVehicle['distance'])) {
            $this->setDistance($dataOfVehicle['distance']);
        }
    }

}