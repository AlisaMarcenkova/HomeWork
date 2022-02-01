<?php

$mass = (int) readline("Enter your weight lbs: ");

$height = (float) readline("Enter your height in inches: ");

function bmi($mass, $height){
  return $mass/($height * $height) * 703;
}

$bmi = bmi($mass,$height);

if ($bmi <= 18.5) {
   echo "Under Weight";
} else if ($bmi > 18.5 && $bmi<=25 ) {
    echo "Normal Weight";
} else if ($bmi > 25) {
    echo "Over Weight";
}
echo " Your BMI value is " . $bmi . PHP_EOL;
