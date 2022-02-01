<?php

$word = 'leviathan';
$secret = '---------';
$tries = 7;
$misses = [];
$guessedLetters = [];

while ($tries != 0) {
    echo "Word: " . $secret;
    echo PHP_EOL;
    echo "Misses: " . implode(', ', $misses);
    echo PHP_EOL;
    $letter = readline("Guess: ");
    echo PHP_EOL;
    echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-";
    echo PHP_EOL;

    if (strstr($word, $letter)) {
        $guessedLetters[] = $letter;
        echo "You guessed a letter!";
        echo PHP_EOL;
        if ($word === $letter) {
            echo "You guessed a word: " . $word;
        }
        echo PHP_EOL;
        for ($i = 0; $i < strlen($word); $i++) {
            if ($letter == $word[$i]) {
                echo $word[$i];
            } else {
                echo '-';
            }
        }
    } else {
        $misses[] = $letter;
        $tries--;
        if ($tries == 0) {
            echo "You lost!";
            echo PHP_EOL;
            exit;
        }
    }
}