<?php

class SavingsAccount
{

    private float $balance;
    private float $totalWithdrawn = 0;
    private float $totalDeposited = 0;
    private float $totalInterest = 0;
    private float $interestRate;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function withdrawal($withdrawn)
    {
        $this->balance -= $withdrawn;
        $this->totalWithdrawn += $withdrawn;
    }
    public function getWithdraw(){
        return $this->totalWithdrawn;
    }

    public function deposit($depositedAmount)
    {
        $this->balance += $depositedAmount;
        $this->totalDeposited += $depositedAmount;
    }
    public function getDeposit(){
        return $this->totalDeposited;
    }

    public function monthlyInterest()
    {
        $monthlyRate = $this->interestRate / 12;
        $monthlyInterestRate = $monthlyRate * $this->balance;
        $this->balance += $monthlyInterestRate;
        $this->totalInterest += $monthlyInterestRate;
    }
    public function setInterestRate(float $interestRate){
        $this->interestRate = $interestRate;
    }

    public function getBalance()
    {
        return $this->balance;
    }
    public function getTotalInterest(){
        return $this->totalInterest;
    }
}

$balance = (float)readline("How much money is in the account?: ");
$savings = new SavingsAccount($balance);
$interestRate = (float)readline("Enter the annual interest rate: ");
$savings->setInterestRate($interestRate);
$howLongAccountIsOpened = (int) readline("How long has the account been opened? ");
for ($i = 0; $i < $howLongAccountIsOpened; $i++) {
    $depositedAmount = (float)readline("Enter amount deposited for  month: $i: ");
    $savings->deposit($depositedAmount);
    $withdrawn = (float)readline("Enter the amount withdrawn for $i: ");
    $savings->withdrawal($withdrawn);
    $savings->monthlyInterest();
}
echo "Total deposited: $" . number_format($savings->getDeposit(), 2, '.', ',');
echo PHP_EOL;
echo "Total withdrawn: $" . number_format($savings->getWithdraw(), 2, '.', ',');
echo PHP_EOL;
echo "Interest earned: $" . number_format($savings->getTotalInterest(), 2, '.', ',');
echo PHP_EOL;
echo "Ending balance: $" . number_format($savings->getBalance(), 2, '.', ',');
echo PHP_EOL;
