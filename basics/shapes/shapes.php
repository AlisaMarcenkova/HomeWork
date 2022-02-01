<?php

abstract class Shapes
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Triangle extends Shapes
{
    public function getArea()
    {
        $a = 5;
        $b = 3;
        $c = ($a * 2) + ($b * 2);
        return $c * 2;
    }
}

class Square extends Shapes
{
    public function getArea()
    {
        $radius = 2;
        $area = 3.14 * ($radius * 2);
        return $area;
    }
}

class Circle extends Shapes
{
    public function getArea()
    {
        $a = 7;
        return $a * 4;
    }
}

$triangle = new Triangle('Triangle');
$square = new Square('Square');
$circle = new Circle('Circle');

//echo "Triangle: " . $triangle->getArea() . PHP_EOL;
//echo "Square: " . $square->getArea() . PHP_EOL;
//echo "Circle: " . $circle->getArea() . PHP_EOL;

class CalculationStore
{
    private array $calculations = [];

    public function addToList(Shapes $shapes): void
    {
        $this->calculations[] = $shapes;
    }

    public function getShapes(): array
    {
        return $this->calculations;
    }
}

$calculations = new CalculationStore();
$calculations->addToList($circle);
$calculations->addToList($triangle);
$calculations->addToList($square);
//
//foreach ($calculations->getShapes() as $shape) {
//
//$output = $shape->getArea() + $shape->getArea() + $shape->getArea();
//
//}
//echo "Size of all shapes together: " . $output . PHP_EOL;




while (true) {
    echo "[1] Show the area calculation of triangle: " . PHP_EOL;
    echo "[2] Show the area calculation of circle: " . PHP_EOL;
    echo "[3] Show the area calculation of square: " . PHP_EOL;
    echo "[4] Show the calculation of all shape areas together: " . PHP_EOL;
    echo "[X] Exit: " . PHP_EOL;


    $choice = readline("Select an option: ");

    switch ($choice) {
        case 1:
            echo $triangle->getArea() . PHP_EOL;
            break;

        case 2:
            echo $circle->getArea() . PHP_EOL;
            break;

        case 3:
            echo $square->getArea() . PHP_EOL;
            break;
        case 4:
            foreach ($calculations->getShapes() as $shape) {
                $output = $triangle->getArea() + $circle->getArea() + $square->getArea();
            } echo $output . PHP_EOL;
            break;
        default:
            exit;
    }
}