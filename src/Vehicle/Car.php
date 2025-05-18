<?php

namespace VehiclePark\Vehicle;

use VehiclePark\Interface\CalculationFuel;
use VehiclePark\Util\CarMotobike;

class Car extends Vehicle implements CalculationFuel
{
    use CarMotobike;



}