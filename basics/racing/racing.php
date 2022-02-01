<?php

$amount = readline("Enter the amount at least 100 $: ");
$bet = 100;

if($amount < 100){
    exit("Not enough money to bet!");
}
$road = 10;
$participants = ['$', '€', '£', '¥'];
$track = range(1, 10);
$speed = rand(1, 3);
$racingTracks = [];

for ($i = 0; $i < count($participants); $i++) {
    for ($j = 0; $j < $road; $j++) {
        $racingTracks[$i][0] = $participants[$i];
        $racingTracks[$i][$j] = '-';
    }
}

function trackVisible(array $track): void
{
    foreach ($track as $item) {
        foreach ($item as $value) {
            echo $value;
        }
        echo PHP_EOL;
    }
}

while (true) {
    echo "Press 1 to race: " . PHP_EOL;
    echo "Press 2 to choose track to bet on: " . PHP_EOL;
    echo "Press [X] to exit: " . PHP_EOL;
    $begin = readline("Select option: ");
    echo PHP_EOL;

    switch ($begin) {

        case 1:
               trackVisible($racingTracks);

            for ($i = 0; $i < count($racingTracks); $i++) {
                for ($j = 0; $j < ($road - 1); $j++) {
                    $racingTracks[$i][$speed] = $participants[$i];
                    $racingTracks[$i][$j] = '-';
                }
            }

                           //for ($i = 0; $i < count($participants); $i++) {
            //                for ($j = 0; $j < $road; $j++) {
            //                    $racingTracks[$i][0] = $participants[$i];
            //                    $racingTracks[$i][$j] = $speed;
            //                }
            //            }
           // foreach ($participants as $participant) {
            //            $participant[0] = $speed;
            //            }echo PHP_EOL;
                break;

        case 2:
            echo "Bet on track [1] 100$" . PHP_EOL;
            echo "Bet on track [2] 100$" . PHP_EOL;
            echo "Bet on track [3] 100$" . PHP_EOL;
            echo "Bet on track [4] 100$" . PHP_EOL;
            $betOnTrack = (int)readline("Chose the track you're betting on: ") . PHP_EOL;

            $amount -= $bet;
            echo "Amount of left $: " . $amount . PHP_EOL;
            if($amount < $bet){
                echo "Not enough money to bet!" . PHP_EOL;
            }if ($amount <= 0){
            exit("Please top up your balance and try again!") . PHP_EOL;
        }
            break;

        default:
            exit;
    }
}