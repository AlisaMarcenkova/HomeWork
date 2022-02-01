<?php

$person = new stdClass();
$person->name = 'Ashley';
$person->money = 3500;
$person->licences = ['B', 'F', 'Z'];

function createGun(string $name, int $price, string $licence = null): stdClass{
  $gun = new stdClass();
  $gun->name = $name;
  $gun->price = $price;
  $gun->licence = $licence;
  return $gun;
};

$guns = [
  createGun("M4A1", 1542, 'B'),
  createGun("AK-47", 4630, 'F'),
  createGun("AA-12", 2000, 'Z'),
  createGun("MP5", 530, 'C'),
  createGun("KSG-12", 1230, 'B')
];

echo "{$person->name} has {$person->money}$" . PHP_EOL . PHP_EOL;

$cart = [];

while (true){

    echo "[1] Buy" . PHP_EOL;
    echo "[2] To cart" . PHP_EOL;
    echo "[3] Checkout" . PHP_EOL;
    echo "[X] Exit" . PHP_EOL;

    $select = (int) readline('Select an option: ');

    switch ($select){
        case 1:
            foreach ($guns as $key => $gun){
                echo "{$key} {$gun->name} ({$gun->licence}) {$gun->price}$" . PHP_EOL;
            }
            $choice = (int) readline('Choose a gun: ');

            $gun = $guns[$choice] ?? null;

            if($gun === null){
                echo "Gun not found" . PHP_EOL;
                exit;
            }

            if($gun->licence !== null){
                if(!in_array($gun->licence, $person->licences)){
                    echo "Invalid licence" . PHP_EOL;
                    exit;
                }
            }
            echo "You have a licence" . PHP_EOL;

            if($person->money <= $gun->price){
                echo "Not enough cash!" . PHP_EOL;
                exit;
            }

            echo "Purchased successfully!" . PHP_EOL;

            $person->money -= $gun->price;

            echo "{$person->name} has left with {$person->money}$" . PHP_EOL;

            break;

        case 2:
            foreach ($guns as $key => $gun){
                echo "{$key} {$gun->name} ({$gun->licence}) {$gun->price}$" . PHP_EOL;
            }
            $choice = (int) readline('Choose a gun: ');

            $gun = $guns[$choice] ?? null;

            if($gun === null){
                echo "Gun not found" . PHP_EOL;
                exit;
            }

            if($gun->licence !== null){
                if(!in_array($gun->licence, $person->licences)){
                    echo "Invalid licence" . PHP_EOL;
                    exit;
                }
            }
            echo "You have a licence" . PHP_EOL;

            if($person->money <= $gun->price){
                echo "Not enough cash!" . PHP_EOL;
                exit;
            }

            $cart[] = $gun;

            echo "Added {$gun->name} to the cart." . PHP_EOL;

            break;

        case 3:

            $total = 0;

            foreach ($cart as $gun){
                $total += $gun->price;
                echo "{$gun->name}" . PHP_EOL;
            }
            echo "----------------" . PHP_EOL;
            echo  "Total: $total $";
            echo PHP_EOL;

            if ($person->money >= $total){
                echo "Payment successful";
            }else {
                echo "Payment failed.";
            }

            exit;
        default:
            exit;
    }
}