<?php

namespace VehiclePark\Vehicle;

use VehiclePark\Interface\CalculationMethods;
use VehiclePark\Util\CarMotobike;

class Motobike extends Vehicle implements CalculationMethods
{
    use CarMotobike;


}