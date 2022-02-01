<?php

$digits = [5, 23, 90, 13.5, "Hello"];

for ($i = $digits; $i <= 5; $i++){
  echo sizeof($i);
}

function double(int $numbers): int
{
 $numbers *= 2;
 return $numbers;
}

foreach ($digits as $digit){
    echo double((int)$digit);
}
