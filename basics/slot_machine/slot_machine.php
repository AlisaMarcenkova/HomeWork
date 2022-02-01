<?php
$amount = readline("Enter the amount $: ");
$gameSpace = [
    ['-', '-', '-', '-'],
    ['-', '-', '-', '-'],
    ['-', '-', '-', '-'],
];

$symbols = ['A', 'B', 'C', 'D'];

$amountToWin = [
    "A" => 5,
    "B" => 10,
    "C" => 15,
    "D" => 20];

$combinations = [
    [
        [0, 0], [0, 1], [0, 2], [0, 3]
    ],
    [
        [1, 0], [1, 1], [1, 2], [1, 3]
    ],
    [
        [2, 0], [2, 1], [2, 2], [2, 3]
    ],
    [
        [2, 0], [1, 1], [1, 2], [0, 3]
    ],
    [
        [0, 0], [1, 1], [1, 2], [2, 3]
    ]
];

function getMatches(array $combinations, array $gameSpace): array
{
    $matches = [];
    foreach ($combinations as $key => $combination) {
        foreach ($combination as $value => $item) {
            [$row, $column] = $item;
            $matches[$key][$value] = $gameSpace[$row][$column];
        }
    }
    $winnings = [];
    foreach ($matches as $match) {
        if ((count(array_unique($match)) === 1)) {
            $winnings[] = $match[0];
        }
    }
    return $winnings;
}

function calculateWinnigs(array $lines, array $amountToWin, int $spinCost)
{
    $wonAmount = 0;
    foreach ($lines as $line) {
        switch ($line) {
            case 'A':
                $wonAmount += $amountToWin['A'] * $spinCost;
                break;
            case 'B':
                $wonAmount += $amountToWin['B'] * $spinCost;
                break;
            case 'C':
                $wonAmount += $amountToWin['C'] * $spinCost;
                break;
            case 'D':
                $wonAmount += $amountToWin['D'] * $spinCost;
                break;
        }
    }
    return $wonAmount;
}

function display_board(array $gameSpace): void
{
    foreach ($gameSpace as $item) {
        foreach ($item as $value) {
            echo " $value ";
        }
        echo PHP_EOL;
    }
}

function isBoardFull(array $gameSpace): bool
{
    foreach ($gameSpace as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}

echo "Credits: " . $amount . PHP_EOL;
while (true) {

    echo "[1] Press [1] to chose your bet: " . PHP_EOL;
    echo "[2] Press [2] to spin" . PHP_EOL;
    echo "[3] Press X to exit" . PHP_EOL;

    $options = readline("Select you option: ");

    switch ($options) {
        case 1:
            echo "Bet [1], Multiplier x 1 " . PHP_EOL;
            echo "Bet [2], Multiplier x 2 " . PHP_EOL;
            echo "Bet [3], Multiplier x 3 " . PHP_EOL;
            echo "Bet [4], Multiplier x 4 " . PHP_EOL;
            echo "Bet [5], Multiplier x 5 " . PHP_EOL;
            $spinCost = (int)readline("Chose your bet: ");
            break;
        case 2:
            foreach ($gameSpace as $key => $value) {
                foreach ($value as $itemKey => $item) {
                    $gameSpace[$key][$itemKey] = $symbols[array_rand($symbols)];
                }
            }
            display_board($gameSpace);

            $amount -= $spinCost;
            echo "Credits left: " . $amount . "$" . PHP_EOL;
            if ($amount === 0 || $amount < $spinCost) {
                echo "You don't have enough credits!" . PHP_EOL;
                exit;
            }

            $lines = getMatches($combinations, $gameSpace);

            if (sizeof($lines) > 0) {
                $wonAmount = calculateWinnigs($lines, $amountToWin, $spinCost);
                $amount += $wonAmount;
                echo "You won $wonAmount $" . PHP_EOL;
            }

            break;
        default:
            exit;
    }
}


//$symbols[] = array_shift($symbols);
//$wheel = [];
//foreach ($symbols as $symbol){
//  $wheel[] = $symbol;
//}

//$secondWheel = array_reverse($wheel);
//$wheelThird = $wheel;

