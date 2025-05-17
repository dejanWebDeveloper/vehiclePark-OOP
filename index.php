<?php

use VehiclePark\Application;

require_once __DIR__. '/vendor/autoload.php';

try {
    Application::start();
} catch (Exception $e) {
    echo $e->getMessage();
}

