<?php

namespace VehiclePark;
use Exception;
use VehiclePark\Vehicle\Car;
use VehiclePark\Vehicle\Motobike;
use VehiclePark\VehiclePark\VehiclePark;

class Application
{
    /**
     * @return void
     * @throws Exception
     */
    public static function start()
    {
        $car = new Car([
            "id"=>"BG1245",
            "brand"=>"AUDI",
            "model"=>"A4",
            "yearOfManufacture"=>2025,
            "engine"=>1989,
            "travelTime"=>220,
            "distance"=>120,
            "fuelType"=>"diesel",
            "numberOfWheels"=>4
        ]);
        var_dump($car);
        $motobike = new Motobike([
            "id"=>"541445",
            "brand"=>"Yamaha",
            "model"=>"ff155",
            "yearOfManufacture"=>2022,
            "engine"=>750,
            "fuelType"=>"gasoline",
            "numberOfWheels"=>2,
            "travelTime"=>4.5,
            "distance"=>100
        ]);
        var_dump($motobike);
        echo $motobike->speedCalculation();
        $vehiclePark01 = new VehiclePark();
        $vehiclePark01->addVehicle($car);
        var_dump($vehiclePark01);
        echo $car->consumedFuelPrice();

    }
}

