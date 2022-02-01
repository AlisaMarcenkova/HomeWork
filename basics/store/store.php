<?php

$personInfo = explode(',', file_get_contents('./store/person.txt'));

$person = new stdClass();
$person->name = $personInfo[0];
$person->money = (int) $personInfo[1];

function createProduct(string $name, int $price, string $category, string $description, string $expiryDate, int $amount): stdClass{
    $product = new stdClass();
    $product->name = $name;
    $product->price = $price;
    $product->category = $category;
    $product->description = $description;
    $product->expiryDate = $expiryDate;
    $product->amount = $amount;
    return $product;
};

if (($getProductInfo = fopen("./store/products.csv", 'r')) !== false){
    while ($info = fgetcsv($getProductInfo, 100, ",")){
        [$name, $price, $category, $description, $expiryDate, $amount] = $info;
        $products[] = createProduct($name, $price, $category, $description, $expiryDate, $amount);
    }
    fclose($getProductInfo);
}

//$products = [
  //  createProduct("Hotdogs", 3),
    //createProduct("Kafija", 1),
    //createProduct("Čipsi", 2),
    //createProduct("Kola", 1),
    //createProduct("Baltmaize", 1)
//];
echo "{$person->name} has {$person->money}$ " . PHP_EOL . PHP_EOL;
$cart = $cartProductKeys = explode(',', "./store/cart.txt");

while (true) {

    echo "[1] Buy" . PHP_EOL;
    echo "[2] To cart" . PHP_EOL;
    echo "[3] Checkout" . PHP_EOL;
    echo "[X] Exit" . PHP_EOL;

    $select = (int)readline('Select an option: ');

    switch ($select) {
        case 1:
            foreach ($products as $key => $product) {
                echo "{$key} {$product->name} {$product->price}$ [{$product->category}] [{$product->description}] [{$product->expiryDate}] [{$product-> amount}]" . PHP_EOL;
            }
            $choice = (int)readline('Choose a product: ');

            $product = $products[$choice] ?? null;

            if ($product === null) {
                echo "Product not found" . PHP_EOL;
                exit;
            }

            if ($person->money <= $product->price) {
                echo "Not enough cash!" . PHP_EOL;
                exit;
            }

            echo "Purchased successfully!" . PHP_EOL;

            $person->money -= $product->price;

            echo "{$person->name} has left with {$person->money}$" . PHP_EOL;

            break;

        case 2:
            foreach ($products as $key => $product) {
                echo "{$key} {$product->name} {$product->price}$ [{$product->category}] [{$product->description}] [{$product->expiryDate}] [{$product-> amount}]" . PHP_EOL;
            }
            $choice = (int)readline('Choose a product: ');

            $product = $products[$choice] ?? null;

            if ($product === null) {
                echo "Product not found" . PHP_EOL;
                exit;
            }

            if ($person->money <= $product->price) {
                echo "Not enough cash!" . PHP_EOL;
                exit;
            }

            $cart[] = $choice;

            echo "Added {$product->name} to the cart." . PHP_EOL;

            break;

        case 3:

            $total = 0;

            foreach ($cart as $productKey) {
                $product = $products[$productKey];
                $total += $product->price;
                echo "{$product->name}" . PHP_EOL;
            }
            echo "----------------" . PHP_EOL;
            echo "Total: $total $";
            echo PHP_EOL;

            if ($person->money >= $total) {
                echo "Payment successful" . PHP_EOL;
            } else {
                echo "Payment failed." . PHP_EOL;
            }

            file_put_contents('./store/cart.txt', []);

            exit;
        default:
            $productKeys = implode(',', $cart);
            file_put_contents("./store/cart.txt", $productKeys);
            exit;
    }
}