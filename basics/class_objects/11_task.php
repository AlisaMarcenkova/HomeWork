<?php

class Account{
    private string $name;
    private float $amount;

    public function __construct(string $name, float $amount = 0)
    {
        $this->name = $name;
        $this->amount = $amount;
    }
    public function getAmount(){
        return $this->amount;
    }
    public function deposit(float $amount){
        $this->amount += $amount;
    }
    public function withdrawal(float $amount){
        if($this->amount < $amount){
            return "Not enough money";
        }
        $this->amount -= $amount;
        return $amount;
    }
    function transfer(Account $from, Account $to, float $amount){
        $to->deposit($amount);
        $from->withdrawal($amount);
    }
}

$person = new Account("Matt", 1000);
$myAccount = new Account("My account", 0);

$person->withdrawal(100);
$myAccount->deposit(100);

echo "Matt balance is " . $person->getAmount();
echo PHP_EOL;
echo "My balance is " . $myAccount->getAmount();
echo PHP_EOL;

$ashley = new Account("Ashley", 100.0);
$alex = new Account("Alex", 0);
$amelia = new Account("Amelia", 0);

$ashley->transfer($ashley, $alex, 50);
$alex->transfer($alex, $amelia, 25);

echo "Ashley's balance is " . $ashley->getAmount();
echo PHP_EOL;
echo "Alex balance is " . $alex->getAmount();
echo PHP_EOL;
echo "Amelia's balance is " . $amelia->getAmount();
echo PHP_EOL;