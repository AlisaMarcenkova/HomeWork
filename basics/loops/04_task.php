<?php

$digits = [1, 5, 13, 15, 30, 45, 67];

foreach ($digits as $digit){
    if($digit % 3 == 0){
        echo $digit;
    }
}