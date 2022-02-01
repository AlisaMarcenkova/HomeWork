<?php

$fruits = [
  [
      "name" => "Watermelon",
      "weight" => 9
  ],
  [
      "name" => "Mango",
      "weight" => 12
  ],
  [
      "name" => "Pineapple",
      "weight" => 25
  ],
    [
        "name" => "Orange",
        "weight" => 5
    ]
];

$shippingCosts = [
    "less" => 1,
    "More" =>2
];

function weightCheck($weight): bool
{
    return $weight > 10;
};

foreach ($fruits as $fruit){
   echo $fruit['name'] . " ";
   echo weightCheck($fruit['weight']) ? "shipping cost is 2€" : "shipping cost is 1€";
   echo PHP_EOL;
};