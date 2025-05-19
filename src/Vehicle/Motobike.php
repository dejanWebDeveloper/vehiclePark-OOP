<?php

namespace VehiclePark\Vehicle;

use VehiclePark\Interface\CalculationFuel;
use VehiclePark\Util\CarMotobike;

/**
 * klasa Motobike nasledjuje sve od Vehicle i ima dodatnu funkcionalnost definisanu u trait CarMotobike i implementira
 * iz interface metodu za racunanje cene goriva
 */
class Motobike extends Vehicle implements CalculationFuel
{
    use CarMotobike;


}