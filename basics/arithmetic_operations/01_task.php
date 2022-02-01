<?php

function returner($x, $y)
{
    return $x == 5 || $y == 5 || $x + $y == 5 || abs($x - $y) == 5;
}

var_dump(returner(5, 4));
var_dump(returner(7, 8));
var_dump(returner(1, 9));
