<?php

namespace VehiclePark\Vehicle;

use VehiclePark\Interfaces\CalculationFuel;
use VehiclePark\Util\CarMotobike;

/**
 * klasa Car nasledjuje sve od Vehicle i ima dodatnu funkcionalnost definisanu u trait CarMotobike i implementira
 *  iz interface metodu za racunanje cene goriva
 */
class Car extends Vehicle implements CalculationFuel
{
    use CarMotobike;
}