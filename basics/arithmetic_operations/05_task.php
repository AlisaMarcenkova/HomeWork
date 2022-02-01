<?php

$value = readline("I'm thinking of a number between 1-100. Try to guess it: ");
$num = rand(1, 100);

if ($value < $num){
    echo "Sorry, you are too low. I was thinking of " . $num;
}elseif ($value > $num){
    echo "Sorry, you are too high. I was thinking of " . $num;
}elseif ($value == $num){
    echo "You guessed it! What are the odds?!?";
}
