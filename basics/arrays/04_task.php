<?php

$digits = [
  45, 87, 39, 32, 93, 86, 12, 44, 75, 50
];

$numbers = array_pad($digits, 10, rand(1, 100));

$merge = array_merge($digits, $numbers);

function update_last(&$array, $value){
    array_pop($array);
    $array[] = $value;
}

echo "Array 1: " . update_last($digits,-7);

foreach ($digits as $digit){
echo $digit . " ";
}
echo PHP_EOL;

echo "Array 2: ";
foreach ($numbers as $number){
    echo $number . " ";
}
echo PHP_EOL;