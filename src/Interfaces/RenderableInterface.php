<?php
namespace VehiclePark\Interfaces;
interface RenderableInterface
{
    public function getHtml($vehicleData);
    public function render($vehicleData);
}