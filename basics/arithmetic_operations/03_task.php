<?php

$lowerBound = 1;
$upperBound = 100;

$range = range($lowerBound, $upperBound);

echo "The sum of 1 to 100 is " . array_sum($range) . PHP_EOL;
echo "The average is " . array_sum($range) / count($range) . PHP_EOL;

