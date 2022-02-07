<?php

$words = ['money', 'game', 'day', 'rainbow', 'friend', 'cat', 'fish', 'wagon', 'function', 'project'];
$randomWord = $words[array_rand($words)];
$missedLetters = [];
$guessedLetters = [];
$length = strlen($randomWord);
$letters = str_split($randomWord);
$tries = 10;
$hiddenLetter = "-";
$hideTheWord = str_repeat($hiddenLetter, count($letters));
while ($tries != 0) {

    echo "Word: " . $hideTheWord;

//    for ($i = 0; $i < strlen($randomWord); $i++) {
//        $hiddenWord = '';
//        $hiddenWord = '' . $hiddenWord . '-';
//
//        echo $hiddenWord;
//    }
    echo PHP_EOL;
    echo "Misses: " . implode(" ", $missedLetters);
    echo PHP_EOL;
    $guess = readline("Guess: ");
    echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-";
    echo PHP_EOL;

    if (strstr($randomWord, $guess)) {
        $guessedLetters[] = $guess;
        echo "You guessed a letter!" . PHP_EOL;

        //for ($j = 0; $j < strlen($randomWord); $j++) {
        //if($randomWord[$j] === $guess)
        if (in_array($guess, $letters)) {
            $j = array_keys($letters, $guess);
            foreach ($j as $item) {
                $hideTheWord[$item] = $guess;
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
        if($hideTheWord === $randomWord){
            echo "You guessed a word: " . $randomWord;
            echo PHP_EOL;
            exit;
        }
    } else {
        $missedLetters[] = $guess;
        $tries--;
        if ($tries == 0) {
            echo "You lost!";
            echo PHP_EOL;
            exit;
        }
    }
}