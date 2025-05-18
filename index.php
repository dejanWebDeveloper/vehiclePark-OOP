<?php

use VehiclePark\Application;

require_once __DIR__. '/vendor/autoload.php';

try {
    Application::start();
    Application::sortByClass();
} catch (Exception $e) {
    echo $e->getMessage();
}


