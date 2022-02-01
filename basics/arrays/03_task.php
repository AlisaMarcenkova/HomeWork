<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

$valueEntered = (int) readline("Enter the value to search for: ");

//todo check if an array contains a value user entered

if(in_array($valueEntered, $numbers)){
    echo "Array contains your number" . PHP_EOL;
}else{
    echo "Sorry your number doesn't match" . PHP_EOL;
}