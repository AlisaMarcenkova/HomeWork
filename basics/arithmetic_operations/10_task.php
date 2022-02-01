<?php

function areaOfCircle($radius){
   return pi() * $radius * $radius;
}

function areaOfRectangle($length, $width){
    return $length * $width;
}
function areaOfTriangle($base, $h): float
{
    return $base * $h * 0.5;
}

while (true) {
    echo "Geometry Calculator" . PHP_EOL;
echo PHP_EOL;
    echo "1. Calculate the Area of a Circle" . PHP_EOL;
    echo "2. Calculate the Area of a Rectangle" . PHP_EOL;
    echo "3. Calculate the Area of a Triangle" . PHP_EOL;
    echo "4. Quit" . PHP_EOL;

    $select = (int)readline('Enter your choice (1-4): ');

    switch ($select) {
        case 1:
            $radius = (float)readline('Enter radius: ');
            echo "Area of circle is " . areaOfCircle($radius) . PHP_EOL;
            break;
        case 2:
            $length = (float)readline("Enter length: ");
            $width = (float)readline("Enter width: ");
            echo "Area of rectangle is " . areaOfRectangle($length, $width) . PHP_EOL;
            break;
        case 3:
            $base = (float)readline("Enter base: ");
            $h = (float)readline('Enter h: ');
            echo "Area of triangle is " . areaOfTriangle($base, $h) . PHP_EOL;
            break;
        default:
            exit;
    }
}