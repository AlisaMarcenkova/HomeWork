<?php

$persons = new stdClass();
$persons->name = "John";
$persons->surname = "Doe";
$persons->age = 50;

function ageCheck(stdClass $person): bool{
    return $person->age >= 18;
}

echo "{$persons->name} {$persons->surname} ";
echo ageCheck($persons) ? "You are old enough." : "You are too young.";