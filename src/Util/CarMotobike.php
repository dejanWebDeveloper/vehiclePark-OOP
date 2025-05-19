<?php

namespace VehiclePark\Util;

use Exception;

/**
 * trait u kome sam definisao sve dodatne funkcionalnosti potrebne za klase Car i MotoBike
 */
trait CarMotobike
{
    protected int $engine;
    protected string $fuelType;
    //staticki atribut koja mi koristi da izracunam prosecnu potrosnju na 100km koju dalje koristim za obracun ukuone
    // cene goriva za to vozilo
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
        //naveo sam u niz koje su sve moguce vrednosti za gorivo i na osnovu toga izvrsio validaciju
        $possibleFuelType = array(
            'gasoline',
            'diesel'
        );
        if (!in_array($fuelType, $possibleFuelType)) {
            throw new Exception("Invalid fuel type (gasoline or diesel)");
        }
        $this->fuelType = $fuelType;
    }
    /**
     * metoda za obracun cene goriva gde sam na osnovu zapremine motora definisao prosecnu potrosnju goriva za vozilo
     * i onda na osnovu prosecne potrosnje i predjene distance racunao ukupnu cenu potrosnje goriva gde sam proizvoljno uneo
     * cenu goriva po L
     * Na osnovu ove metode, stvarna primena bi mogla da bude da svaki vozac na kraju dana dobije izvestaj, trebao si na osnovu predjenih km
     * i prosecne potrosnje da ukupno potrosis odredjenu kolicinu novca, a ti si potrosio vise ili manje i na osnovu toga
     * da odredjene radnike dodatno nagradimo jer su ekonomicni vozaci.
     */
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
            return round($consumedFuel * 195, 2);
        }
        if ($this->getFuelType() === 'diesel') {
            return round($consumedFuel * 205, 2);
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
