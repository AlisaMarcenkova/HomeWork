<?php

$persons = new stdClass();
$persons->name = "John";
$persons->surname = "Doe";
$persons->age = 50;

var_dump($persons);

echo $persons ->name . " " . $persons->surname . " " . $persons->age . PHP_EOL;