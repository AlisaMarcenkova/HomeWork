<?php


$numbers = [20, 30, 25, 35, -16, 60, -100];

//todo calculate an average value of the numbers

$average = array_sum($numbers) / count($numbers) . PHP_EOL;

echo "Average value of numbers is " . $average;