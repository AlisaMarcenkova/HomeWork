<?php

require_once 'class_objects/03_task/FuelGauge.php';

require_once 'class_objects/03_task/Odometer.php';

require_once 'class_objects/03_task/Tire.php';

require_once 'class_objects/03_task/Car.php';

require_once 'class_objects/03_task/LightsClose.php';

require_once 'class_objects/03_task/LightsFar.php';

$name = readline('Car name: ');
$fuelGaugeAmount = (int)readline('Fuel Gauge amount: ');
$driveDistance = (int)readline('Drive distance: ');

$car = new Car($name, 2303, $fuelGaugeAmount);

echo "------ " . $car->getName() . " ------";
echo PHP_EOL;

$startCode = (int) readline("Enter car startCode: ");
$car->start($startCode);

if (!$car->hasTurnedOn()) {
    echo "{$car->getName()} wasn't turned on.";
    echo PHP_EOL;
}

while ($car->getFuel() > 0 && $car->checkForValidTires() && $car->hasTurnedOn() && $car->checkForValidLights() && $car->checkForValidFarLights()) {
    echo "Fuel: " . $car->getFuel() . "l" . PHP_EOL;
    echo "Mileage: " . $car->getMileage() . "km" . PHP_EOL;
    foreach ($car->getTires() as $tire) {
        echo "Tire ({$tire->getName()}): " . $tire->getTireQuality() . "%" . PHP_EOL;
    }
    foreach ($car->getCloseLights() as $closeLight){
        echo "Close lights ({$closeLight->getName()}): " . $closeLight->getCloseLightsQuality() . "%" . PHP_EOL;
    }
    foreach ($car->getFarLights() as $lightsFar){
        echo "Far lights ({$lightsFar->getName()}): " . $lightsFar->getFarLightsQuality() . "%" . PHP_EOL;
    }
    $car->drive($driveDistance);

    sleep(1);
}