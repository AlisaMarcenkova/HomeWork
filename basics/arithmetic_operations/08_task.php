<?php

$minimumWage = 8.00;
$maxHours = 60;
$employee = readline("Enter employee Nr: ");
$basePay = (float) readline("Enter the base pay: ");
$hoursWorked = (int) readline("Enter hours worked: ");

function salaryCalculation ($basePay, $minimumWage, $hoursWorked, $maxHours){
    $salary = 0;
    if($basePay < $minimumWage || $hoursWorked > $maxHours){
        echo "Error!";
    }elseif ($hoursWorked > 40){
        $salary = $basePay * 40 + 1.5 * $basePay * ($hoursWorked -40);
    }else{
        $salary = $basePay * $hoursWorked;
    }
return $salary;
}

echo "For the employee $employee salary is " . salaryCalculation($basePay, $minimumWage, $hoursWorked, $maxHours) . "$". PHP_EOL;
