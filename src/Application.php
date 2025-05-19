<?php

namespace VehiclePark;

use Exception;
use VehiclePark\Color\Color;
use VehiclePark\Renderable\Renderable;
use VehiclePark\Vehicle\Bike;
use VehiclePark\Vehicle\Car;
use VehiclePark\Vehicle\Motobike;
use VehiclePark\VehiclePark\VehiclePark;
/*
U klasi Application sam instancirao potrebne objekte koje sam dodao u niz objekta klase VehiclePark, a zatim sam njega kao parametar
prosledio metodi objekta klase Renderable koja sluzi za prikaz podataka u html
*/
class Application
{
    /**
     * @throws Exception
     */
    public static function start(): void
    {
        //instancirao sam nekoliko objekata klase Color koje cu setovati atributu Color odredjenog objekta klase vozila
        $red = new Color([
            "id" => 1,
            "colorName" => "red"
        ]);
        $blue = new Color([
            "id" => 2,
            "colorName" => "blue"
        ]);
        $yellow = new Color([
            "id" => 3,
            "colorName" => "yellow"
        ]);
        $aqua = new Color([
            "id" => 4,
            "colorName" => "aqua"
        ]);
        $black = new Color([
            "id" => 5,
            "colorName" => "black"
        ]);
        //instancirao sam nekoliko objekata klase vozila (Car, MotoBike, Bike)
        $car01 = new Car([
            "id" => "BG-1245",
            "brand" => "AUDI",
            "model" => "A4",
            "color" => $blue,
            "yearOfManufacture" => 2025,
            "engine" => 1989,
            "travelTime" => 2.2,
            "distance" => 220,
            "fuelType" => "diesel",
        ]);
        $motobike01 = new Motobike([
            "id" => "PA-1445",
            "brand" => "Yamaha",
            "model" => "X200-d",
            "color" => $red,
            "yearOfManufacture" => 2022,
            "engine" => 750,
            "fuelType" => "gasoline",
            "travelTime" => 3.2,
            "distance" => 320
        ]);
        $bike01 = new Bike([
            "id" => "25-58",
            "brand" => "Capriolo",
            "model" => "9.0 level",
            "color" => $yellow,
            "yearOfManufacture" => 2021,
            "travelTime" => 4.5,
            "distance" => 100
        ]);
        $car02 = new Car([
            "id" => "UE-1285",
            "brand" => "VW",
            "model" => "Golf",
            "color" => $black,
            "yearOfManufacture" => 2005,
            "engine" => 1899,
            "travelTime" => 4,
            "distance" => 450,
            "fuelType" => "diesel",
        ]);
        $motobike02 = new Motobike([
            "id" => "PA-1445",
            "brand" => "BMW",
            "model" => "Nature",
            "color" => $blue,
            "yearOfManufacture" => 2022,
            "engine" => 1300,
            "fuelType" => "gasoline",
            "travelTime" => 7,
            "distance" => 885
        ]);
        $bike02 = new Bike([
            "id" => "24-58",
            "brand" => "MaxBike",
            "model" => "PRO-8",
            "color" => $aqua,
            "yearOfManufacture" => 2021,
            "travelTime" => 5,
            "distance" => 50
        ]);
        /*instancirao sam objekat klase VehiclePark, u njegov niz dodao sve instancirane objekte od klasa vozila i
        izvrsio sortiranje dodatih objekta po kategorijama*/
        $vehiclePark01 = new VehiclePark();
        $vehiclePark01->addVehicle($car01)
            ->addVehicle($motobike01)
            ->addVehicle($bike01)
            ->addVehicle($car02)
            ->addVehicle($motobike02)
            ->addVehicle($bike02)
            ->sortByType();
        //instancirao objekat klase Renderable
        $displayData = new Renderable();
        //////////////////////////////////////
        $displayData->render($vehiclePark01); //pozvao nad instanciranom objektu metodu render i prosledio joj parametar objekat klase VehiclePark
        //////////////////////////////////////
    }
}

