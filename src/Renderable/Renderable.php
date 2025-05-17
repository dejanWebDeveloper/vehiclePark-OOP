<?php

namespace VehiclePark\Renderable;

use VehiclePark\Interface\RenderableInterface;

class Renderable implements RenderableInterface
{
    public function getHtml($vehicleData): string
    {
        ob_start();
        ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">id</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
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
                    <td><?php echo $vehicle->getYearOfManufacture(); ?></td>
                    <td><?php echo $vehicle->getEngine(); ?></td>
                    <td><?php echo $vehicle->getFuelType(); ?></td>
                    <td><?php echo $vehicle->getTravelTime(); ?></td>
                    <td><?php echo $vehicle->getDistance(); ?></td>
                    <td><?php echo $vehicle->consumedFuelPrice(); ?></td>
                    <td><?php echo $vehicle->speedCalculation(); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Average Speed of all vehicles</th>
                <th scope="col">Average Fuel Price of all vehicles</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $vehicleData->averageSpeedCalculation() ?></td>
                    <td><?php echo $vehicleData->averageFuelPriceCalculation() ?></td>
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