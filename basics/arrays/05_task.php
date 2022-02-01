<?php

// TicTacToe

//$board = [
    //['-', '-', '-'],
    //['-', '-', '-'],
  //  ['-', '-', '-'],
//];

$myFile =  file_get_contents("./arrays/gameInfo.txt");
$board = [];
[$boardBase, $combinationBase] = explode('#', $myFile);
$boardRows = explode(';', $boardBase);

foreach (explode(';', $boardBase)as $i => $boardRow){
    foreach (explode(',', $boardRow) as $item){
        $board[$i][] = $item;
    }
}
//var_dump($board);
$player1 = readline("Enter your symbol Player1: ");
$player2 = readline("Enter your symbol Player2: ");

$activePlayer = $player1;
$combinations = [];
foreach (explode('|', $combinationBase) as $combinationNumber => $combination){
    foreach (explode(';', $combination) as $index => $item){
        [$x, $y] = explode(',', $item);
        $combinations[$combinationNumber][$index] = [(int) $x, (int) $y];
    }
}
//$combinations = [
//    [
//      [0, 0], [0, 1], [0, 2],
//    ],
//    [
//      [1, 0], [1, 1], [1, 2]
//    ],
//    [
//        [2, 0], [2, 1], [2, 2]
//    ],
//   [
//    [0, 0], [1, 1], [2, 2]
//  ]
//];

function getWinner(array $combinations, array $board, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item)
        {
            [$row, $column] = $item;
            if ($board[$row][$column] !== $activePlayer) {
                break;
            }

            if (end($combination) === $item) {
                return true;
            }
        }
    }

    return false;
}

function isBoardFull(array $board): bool
{
    foreach ($board as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}

function display_board(array $board): void
{
    foreach ($board as $item){
        foreach ($item as $value){
            echo " $value ";
        }
        echo PHP_EOL;
    }
}

while (!isBoardFull($board) && !getWinner($combinations, $board, $activePlayer)) {

    display_board($board);

    $position = readline("Enter position ({$activePlayer}): ");
    [$row, $column] = explode(',', $position);

    if ($board[$row][$column] !== '-') {
        echo 'Invalid option!' . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $activePlayer;

    if (getWinner($combinations, $board, $activePlayer))
    {
        echo 'Winner is ' . $activePlayer;
        echo PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

echo "It's a tie!";
echo PHP_EOL;

