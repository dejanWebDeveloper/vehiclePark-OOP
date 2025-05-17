<?php

namespace VehiclePark\Vehicle;

use VehiclePark\Interface\CalculationMethods;
use VehiclePark\Util\CarMotobike;

class Car extends Vehicle implements CalculationMethods
{
    use CarMotobike;



}