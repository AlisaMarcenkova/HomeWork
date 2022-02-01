<?php
$checker = 15;
$test = "Text";

if(($checker === 15 && $test === "Text") || $checker === $test){
    echo "Wild " . PHP_EOL;
}else {
    echo "Fine" . PHP_EOL;
}