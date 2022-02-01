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
       //$negative = gmp_neg($this->balance);
        return $this->name . ", $" . number_format($this->balance, 2, '.', ',');
    }
}

$ben = new BankAccount("Benson", 17.25);
$benson = new BankAccount("Benson", -17.50);

echo $ben->show_user_name_and_balance();
echo PHP_EOL;
echo $benson->show_user_name_and_balance();
echo PHP_EOL;