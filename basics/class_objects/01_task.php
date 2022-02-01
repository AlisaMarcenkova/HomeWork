<?php

class Product
{
    private string $name;
    private int $amount;
    private float $startPrice;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStartPrice(): float
    {
        return $this->startPrice;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function printProduct(): string
    {
        return $this->getName() . ', ' . $this->getStartPrice() . '$, ' . 'amount ' . $this->getAmount() . PHP_EOL;
    }

    public function changeThePrice(): float
    {
        $price = (float)readline("Enter the new price: ") . PHP_EOL;

        return $this->startPrice = (float)$price;
    }

    public function changeAmount()
    {
        $amount = (int)readline("Enter new amount of products: ") . PHP_EOL;
        return $this->amount = $amount;
    }
}

//$product = new Product('Logitech mouse', 70.00, 14);

//echo $product->printProduct();

class Item
{
    private array $products = [];

    public function addToList(Product $product): void
    {
        $this->products[] = $product;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}

$item = new Item();
$item->addToList(new Product('Logitech mouse', 70.00, 14));
$item->addToList(new Product('iPhone 5s', 999.99, 3));
$item->addToList(new Product('Epson EB-U05', 440.46, 1));

foreach ($item->getProducts() as $key => $product) {
    echo $product->printProduct();
}

while (true) {
    echo "[1] Change the price: " . PHP_EOL;
    echo "[2] Change the quantity: " . PHP_EOL;
    echo "[X] Exit: " . PHP_EOL;
    $choice = readline("Select an option: ") . PHP_EOL;

    switch ($choice) {
        case 1:
            foreach ($item->getProducts() as $key => $product) {
                echo "[{$key}]" . $product->getName() . PHP_EOL;
            }
            $select = readline("Chose the product: ") . PHP_EOL;

            foreach ($item->getProducts() as $key => $product){
                if($key == $select){
                    $product->changeThePrice();
                }
            }

            foreach ($item->getProducts() as $key => $product) {
                echo $product->printProduct();
            }
            break;
        case 2:

            foreach ($item->getProducts() as $key => $product) {
                echo "[{$key}]" . $product->getName() . PHP_EOL;
            }
            $chose = readline("Chose the product: ") . PHP_EOL;

            foreach ($item->getProducts() as $key => $product) {
                if ($key == $chose) {
                    $product->changeAmount();
                }
            }

            foreach ($item->getProducts() as $key => $product) {
                echo $product->printProduct();
            }
            break;
        default:
            exit;
    }
}