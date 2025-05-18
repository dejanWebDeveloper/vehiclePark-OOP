<?php

namespace VehiclePark\Vehicle;

use VehiclePark\Interface\CalculationFuel;
use VehiclePark\Util\CarMotobike;

class Motobike extends Vehicle implements CalculationFuel
{
    use CarMotobike;


}