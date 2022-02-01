<?php

$words = ['money', 'game', 'day', 'rainbow', 'friend', 'cat', 'fish', 'wagon', 'function', 'project'];
$randomWord = $words[array_rand($words)];
$missedLetters = [];
$guessedLetters = [];
$tries = 10;
while ($tries != 0) {

    echo "Word: ";

    for ($i = 0; $i < strlen($randomWord); $i++) {
        $hiddenWord = '';
        $hiddenWord = '' . $hiddenWord . '-';

        echo $hiddenWord;
    }
    echo PHP_EOL;
    echo "Misses: ";
    echo PHP_EOL;
    $guess = readline("Guess: ");
    echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-";
    echo PHP_EOL;

    if (strstr($randomWord, $guess)) {
        $guessedLetters[] = $guess;
        echo "You guessed a letter!" . PHP_EOL;

        for ($j = 0; $j < strlen($randomWord); $j++) {
            if($guess == $randomWord[$i]){
                echo $randomWord[$i];
            }else{
                echo '-';
            }
           // if ($randomWord[$j] == $guess) {
            //                $guessIndex[] = strpos($randomWord, $guess);
            //                //$randomWord = substr_replace($randomWord, $guess,$guessIndex);
            //                foreach ($guessIndex as $index) {
            //                    $index = $guess;
            //                    echo $hiddenWord = $index;
            //                    var_dump($guessIndex);
            //                }
            //            }
        }

        if ($guess == $randomWord) {
            echo "You guessed a word!" . PHP_EOL;
        }
    } else {
        $misses[] = $guess;
        $tries--;
        if ($tries == 0) {
            echo "You lost!";
            echo PHP_EOL;
            exit;
        }
    }
}