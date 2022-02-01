<?php

$personOne = new stdClass();
    $personOne->name = "John";
    $personOne->surname = "Doe";
    $personOne->age = 50;

$personTwo    = new stdClass();
    $personTwo->name = "Jane";
    $personTwo->surname = "Doe";
    $personTwo->age = 41;

$personThree = new stdClass();
    $personThree->name = "Jimmy";
    $personThree->surname = "Doe";
    $personThree->age = 13;

$persons = [$personOne, $personTwo, $personThree];

function ageCheck(stdClass $person): bool{
    return $person->age >= 18;
}

foreach ($persons as $person){
    echo "{$person->name} {$person->surname} ";
    echo ageCheck($person) ? "You are old enough" : "You are too young";
    echo PHP_EOL;
}