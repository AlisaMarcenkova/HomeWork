<?php

class SavingsAccount
{

    private float $balance;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function withdrawal($withdrawal): string
    {
        if ($this->balance > 0 && $this->balance > $withdrawal) {
            return "Your current balance after withdrawal is: " . ($this->balance - $withdrawal);
        } else {
            return "You don't have enough funds!";
        }
    }

    public function deposit($addBalance): string
    {
        return "Your current balance after deposit is: " . ($this->balance + $addBalance);
    }

    public function monthlyInterest($interestRateAnnual)
    {
        $monthlyRate = $interestRateAnnual / 12;
        $addRateToBalance = $monthlyRate * $this->balance;
        return $this->balance + $addRateToBalance;
    }

    public function getBalance(): string
    {
        return "Your current balance is: " . $this->balance;
    }
}

$startingBalance = new SavingsAccount(34.75);

while (true) {
    echo "[1] Deposit: ";
    echo PHP_EOL;
    echo "[2] Withdraw: ";
    echo PHP_EOL;
    echo "[3] Add annual interest rate: ";
    echo PHP_EOL;
    echo "[X] Exit: ";
    echo PHP_EOL;

    $select = (int)readline("Select an option: ");

    switch ($select) {
        case 1:
            $addBalance = (float)readline("Enter the amount you want to deposit: ");
            echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-";
            echo PHP_EOL;
            echo $startingBalance->deposit($addBalance);
            echo PHP_EOL;
            echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-";
            echo PHP_EOL;
            break;
        case 2:
            echo $startingBalance->getBalance();
            echo PHP_EOL;
            $withdrawal = (float)readline("Enter the amount you want to withdraw: ");
            echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-";
            echo PHP_EOL;
            echo $startingBalance->withdrawal($withdrawal);
            echo PHP_EOL;
            echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-";
            echo PHP_EOL;
            break;
        case 3:
            $interestRateAnnual = (int)readline("Enter monthly interest Rate: ");
            echo PHP_EOL;
            echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-";
            echo PHP_EOL;
            echo $startingBalance->monthlyInterest($interestRateAnnual);
            echo PHP_EOL;
            echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-";
            echo PHP_EOL;
            break;
        default:
            exit;
    }
}