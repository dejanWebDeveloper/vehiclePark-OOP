<?php

namespace VehiclePark\Util;

use Exception;

trait CarMotobike
{
    protected int $engine;
    protected string $fuelType;
    protected static int $consumedFuelPer100;
    /**
     * @return int
     */
    public function getEngine(): int
    {
        return $this->engine;
    }

    /**
     * @param int $engine
     * @throws Exception
     */
    public function setEngine(int $engine): void
    {
        if ($engine < 0) {
            throw new Exception("Vehicle engine must be a positive integer");
        }
        $this->engine = $engine;
    }

    /**
     * @return string
     */
    public function getFuelType(): string
    {
        return $this->fuelType;
    }

    /**
     * @param string $fuelType
     * @throws Exception
     */
    public function setFuelType(string $fuelType): void
    {
        $possibleFuelType = array(
            'gasoline',
            'diesel'
        );
        if (!in_array($fuelType, $possibleFuelType)) {
            throw new Exception("Invalid fuel type (gasoline or diesel)");
        }
        $this->fuelType = $fuelType;
    }

    public function consumedFuelPrice()
    {
        if ($this->engine < 600) {
            self::$consumedFuelPer100 = 3;
        }
        if ($this->engine < 1200) {
            self::$consumedFuelPer100 = 4;
        }
        if ($this->engine < 1800) {
            self::$consumedFuelPer100 = 5;
        }
        if ($this->engine > 1801) {
            self::$consumedFuelPer100 = 6;
        }
        $consumedFuel = (self::$consumedFuelPer100 * $this->getDistance()) / 100;
        if ($this->getFuelType() === 'gasoline') {
            return $consumedFuel * 195;
        }
        if ($this->getFuelType() === 'diesel') {
            return $consumedFuel * 205;
        }
    }

    public function __construct(array $dataOfVehicle = [])
    {
        parent::__construct($dataOfVehicle);
        if (isset($dataOfVehicle['engine'])) {
            $this->setEngine($dataOfVehicle['engine']);
        }
        if (isset($dataOfVehicle['fuelType'])) {
            $this->setFuelType($dataOfVehicle['fuelType']);
        }
    }
}
