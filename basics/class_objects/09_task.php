<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct($name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    function show_user_name_and_balance(): string
    {
        return $this->name . ", $" . number_format($this->balance, 2, '.', ',');
    }
    function showNegativeBalance(): string
    {
        $negative = 0 - $this->balance;
       //$negative = gmp_neg((int)$this->balance);
        return $this->name . ", $" . number_format($negative, 2, '.', ',');
    }
}

$ben = new BankAccount("Benson", 17.25);
$benson = new BankAccount("Benson", 17.50);

echo $ben->show_user_name_and_balance();
echo PHP_EOL;
echo $benson->showNegativeBalance();
echo PHP_EOL;