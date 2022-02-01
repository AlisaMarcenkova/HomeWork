<?php

$x = "-,-,-,-,-,-,-,-,-#0,0;01;0,2|1,0;1,1;1,2|2,0;2,1;2,2|0,0;01;0,2|1,0;1,1;1,2|2,0;2,1;2,2";

$board = [];
$combinations = [];

[$boardBase, $combinationBase] = explode('#', $x);

$boardRows = explode(';', $boardBase);

foreach (explode(';', $boardBase)as $i => $boardRow){
    foreach (explode(',', $boardRow) as $item){
        $board[$i][] = $item;
    }
}

foreach (explode('|', $combinationBase) as $combinationNumber => $combination){
foreach (explode(';', $combination) as $index => $item){
    [$x, $y] = explode(',', $item);
    $combinations[$combinationNumber][$index] = [(int) $x, (int) $y];
    var_dump($combinations);
}
}