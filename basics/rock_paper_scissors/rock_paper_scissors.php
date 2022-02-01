<?php

$moves = ['rock', 'scissors', 'paper', 'lizard', 'spock'];

$combinations = [
'scissors' => ['paper', 'lizard'],
'paper' => ['rock', 'spock'],
'rock' => ['scissors', 'lizard'],
'lizard' => ['spock', 'paper'],
'spock' => ['scissors', 'rock']

];

echo  $moves[0] . PHP_EOL;
echo  $moves[1] . PHP_EOL;
echo  $moves[2]. PHP_EOL;
echo  $moves[3] . PHP_EOL;
echo  $moves[4] . PHP_EOL;

while(true) {

    $player = readline("chose your move: ");
    $computer = $moves[array_rand($moves)];

    echo "VS" . PHP_EOL;

    echo "Computer move is " . $computer . PHP_EOL;

//[rand(0, count($moves) - 1)]
    if ($player == $computer) {
        echo "It's a tie" . PHP_EOL;
        exit;
    }

    if (in_array($computer, $combinations[$player])) {
        echo "You won!" . PHP_EOL;
    } else {
        echo "You lost!" . PHP_EOL;
    }
}


//elseif($combinations[$player] == $computer){
//    echo "You won!";
//}elseif ($combinations[$computer] == $player){
//    echo "You lost!";
//}


//function getWinner(array $combinations, array $moves, string $activePlayer): bool
//{
//    foreach ($combinations as $combination) {
//        foreach ($combination as $item)
//        {
//            [$row, $column] = $item;
//            if ($moves[$row][$column] !== $activePlayer) {
//                break;
//            }
//
//            if (end($combination) === $item) {
//                return true;
//            }
//        }
//    }
//
//    return false;
//}
//
//function isCombinations(array $moves): bool
//{
//    foreach ($moves as $row) {
//        if (in_array($moves, $row)) return false;
//    }
//    return true;
//}
//
//while (!isCombinations($moves) && !getWinner($combinations, $moves, $activePlayer)) {
//
//    $position = readline("Enter position ({$activePlayer}): ");
//    [$row, $column] = explode(',', $position);
//
//    if ($combinations[$row][$column] !== '-') {
//        echo 'Invalid option!' . PHP_EOL;
//        continue;
//    }
//
//    $moves[$row][$column] = $activePlayer;
//
//    if (getWinner($combinations, $combinations, $activePlayer))
//    {
//        echo 'Winner is ' . $activePlayer;
//        echo PHP_EOL;
//        exit;
//    }
//
//    $activePlayer = $player === $activePlayer ? $computer : $player;
//}
//
//echo "It's a tie!";
//echo PHP_EOL;