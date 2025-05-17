<?php

namespace VehiclePark;

use Exception;
use VehiclePark\Renderable\Renderable;
use VehiclePark\Vehicle\Bike;
use VehiclePark\Vehicle\Car;
use VehiclePark\Vehicle\Motobike;
use VehiclePark\VehiclePark\VehiclePark;

class Application
{
    /**
     * @return void
     * @throws Exception
     */
    public static function start(): void
    {
        $car = new Car([
            "id" => "BG1245",
            "brand" => "AUDI",
            "model" => "A4",
            "yearOfManufacture" => 2025,
            "engine" => 1989,
            "travelTime" => 220,
            "distance" => 120,
            "fuelType" => "diesel",
        ]);
        $motobike = new Motobike([
            "id" => "541445",
            "brand" => "Yamaha",
            "model" => "ff155",
            "yearOfManufacture" => 2022,
            "engine" => 750,
            "fuelType" => "gasoline",
            "travelTime" => 4.5,
            "distance" => 100
        ]);
        $bike = new Bike([
            "id" => "541445",
            "brand" => "Yamaha",
            "model" => "ff155",
            "yearOfManufacture" => 2022,
            "engine" => "",
            "fuelType" => "",
            "travelTime" => 4.5,
            "distance" => 100
        ]);
        $vehiclePark01 = new VehiclePark();
        $vehiclePark01->addVehicle($car)->addVehicle($motobike)->addVehicle($bike);
        $displayData = new Renderable();
        //////////////////////////////////////
        $displayData->render($vehiclePark01);
        //////////////////////////////////////

    }
}

