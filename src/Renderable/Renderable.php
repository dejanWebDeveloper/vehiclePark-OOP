<?php

namespace VehiclePark\Renderable;

use VehiclePark\Interface\RenderableInterface;

class Renderable implements RenderableInterface
{
    public function getHtml($vehicleData): string
    {
        ob_start();
        include 'BootstrapLink.php';
        ?>
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">id</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Color</th>
                <th scope="col">Year Of Manufacture</th>
                <th scope="col">Engine (cm3)</th>
                <th scope="col">Fuel Type</th>
                <th scope="col">Travel Time</th>
                <th scope="col">Distance</th>
                <th scope="col">Price of fuel consumed</th>
                <th scope="col">Average Speed</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($vehicleData->getVehicles() as $key => $vehicle) {
                ?>
                <tr>
                    <th scope="row"><?php echo ++$key ?></th>
                    <td><?php echo $vehicle->getId(); ?></td>
                    <td><?php echo $vehicle->getBrand(); ?></td>
                    <td><?php echo $vehicle->getModel(); ?></td>
                    <td><?php echo $vehicle->getColor()->getColorName(); ?></td>
                    <td><?php echo $vehicle->getYearOfManufacture(); ?></td>
                    <td><?php
                        if (method_exists($vehicle, 'getEngine')) {
                            echo $vehicle->getEngine();
                        } else {
                            echo '-';
                        }
                    ?></td>
                    <td><?php
                        if (method_exists($vehicle, 'getFuelType')) {
                            echo $vehicle->getFuelType();
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td><?php echo $vehicle->getTravelTime(). " h"; ?></td>
                    <td><?php echo $vehicle->getDistance(). " km"; ?></td>
                    <td><?php
                        if (method_exists($vehicle, 'consumedFuelPrice')) {
                            echo $vehicle->consumedFuelPrice(). " RSD";
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td><?php echo $vehicle->speedCalculation(). " km/h"; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Average Speed of all vehicles</th>
                <th scope="col">Total Fuel Price of all vehicles</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $vehicleData->averageSpeedCalculation(). " km/h" ?></td>
                    <td><?php echo $vehicleData->averageFuelPriceCalculation(). " RSD" ?></td>
                </tr>
            </tbody>
        </table>
        <?php
        return ob_get_clean();
    }

    public function render($vehicleData): void
    {
        echo $this->getHtml($vehicleData);
    }

    public function __construct()
    {

    }


}