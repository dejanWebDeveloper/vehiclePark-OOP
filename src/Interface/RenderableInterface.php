<?php
namespace VehiclePark\Interface;
interface RenderableInterface
{
    public function getHtml($vehicleData);
    public function render($vehicleData);
}