<?php

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculate_energy_drinkers(int $surveyed, $purchased_energy_drinks)
{
    return $surveyed * $purchased_energy_drinks;
}

function calculate_prefer_citrus(int $surveyed, $prefer_citrus_drinks)
{
    return $surveyed * $prefer_citrus_drinks;
}

echo "Energy drinkers are: " . calculate_energy_drinkers($surveyed, $purchased_energy_drinks);
echo PHP_EOL;
echo "Prefer citrus drinks: " . calculate_prefer_citrus($surveyed, $prefer_citrus_drinks);
echo PHP_EOL;