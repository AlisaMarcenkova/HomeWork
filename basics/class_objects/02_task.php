<?php

class Point
{
    private int $x;
    private int $y;

    public function __construct($x, $y)
    {
       $this->x = $x;
       $this->y = $y;
    }
    public function swapPoints(){
        return $this->x . ", " . $this->y;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

echo "(" . $p2->swapPoints() . ")";
echo PHP_EOL;
echo "(" . $p1->swapPoints() . ")";
echo PHP_EOL;

//function swapPoints(&$p1, &$p2) {
//    $tmp=$p1;
//    $p1=$p2;
//    $p2=$tmp;
//}
//echo $p2->printPoints();
//swapPoints(p1, p2);
//echo "(" . p1.x . ", " . p1.y . ")";
//echo "(" . p2.x . ", " . p2.y . ")";


