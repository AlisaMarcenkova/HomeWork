<?php

//Create an application BLACKJACK.
//Task consists of basic blackjack application where player plays against computer (desk).
//Each card has assigned value (number) that makes combination.
//Options: Option start the game, "hold" or "pick card". Player can pick card unless it goes over combination of 21. (total sum).
//If the value goes over 21, player looses.
//If player decided "hold", then computer starts to draw cards. If computer goes over 21, he looses.
//If computer reached value between 17-21 and player holds, then the decision is made by who has the higher number.
//!!! YOU DONT NEED TO MAKE FULL GAME WITH ALL POSSIBLE SCENARIOS, MODES, BLACKJACK MOMENT etc. !!!

class Player
{
    private int $playerCards;

    public function __construct($playerCards)
    {
        $this->playerCards = $playerCards;
    }

    public function getPlayerCard(): int
    {
        return $this->playerCards;
    }
}

class Dealer
{
    private int $dealerCards;

    public function __construct($dealerCards)
    {
        $this->dealerCards = $dealerCards;
    }

    public function getDealersCards(): int
    {
        return $this->dealerCards;
    }
}

$symbols = [
    '♣', '♦', '♥', '♠'
];
$symbol = $symbols[array_rand($symbols)];

$cards = [2, 3, 4, 5, 6, 7, 8, 9, 10, 'J' => 10, 'Q' => 10, 'K' => 10, 'A' => 11];
$playerCardsOnHand = new Player($cards[array_rand($cards)]);
$playerCardsOnHandTwo = new Player($cards[array_rand($cards)]);
$dealerCardsOnHand = new Dealer($cards[array_rand($cards)]);
$dealerCardsOnHandSecond = new Dealer($cards[array_rand($cards)]);
$playerCards = [$playerCardsOnHand, $playerCardsOnHandTwo];
$dealerCards = [$dealerCardsOnHand, $dealerCardsOnHandSecond];

function getSumOfPlayerCards($playerCards)
{
    $sum = 0;
    foreach ($playerCards as $card) {
        $sum += $card->getPlayercard();
    }
    return $sum;
}

function getSumOfDealerCards($dealerCards)
{
    $sum = 0;
    foreach ($dealerCards as $card) {
        $sum += $card->getDealersCards();
    }
    return $sum;
}

while (true) {

    echo "[1] Start the game: ";
    echo PHP_EOL;
    echo "[X] Exit: ";
    echo PHP_EOL;

    $choice = (int)readline("Select an option: ");

    switch ($choice) {
        case 1:
            echo "-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-";
            echo PHP_EOL;
            echo "Player cards: ";
            foreach ($playerCards as $playerCard) {
                echo $playerCard->getPlayerCard() . " " . $symbol;
            }
            echo PHP_EOL;
            echo "-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-";
            echo PHP_EOL;
            echo "[1] Hold the card: ";
            echo PHP_EOL;
            echo "[2] Pick the card: ";
            echo PHP_EOL;
            echo "[X] Exit: ";
            echo PHP_EOL;
            $select = (int)readline("Chose an option: ");
            switch ($select) {
                case 1:
                    echo "-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-";
                    echo PHP_EOL;
                    echo "Total sum of player cards: " . getSumOfPlayerCards($playerCards);
                    echo PHP_EOL;
                    echo "Total sum of dealer cards: " . getSumOfDealerCards($dealerCards);
                    echo PHP_EOL;
                    echo "Players cards: ";
                    echo PHP_EOL;
                    foreach ($playerCards as $playerCard) {
                        echo $playerCard->getPlayerCard() . " " . $symbol;
                    }
                    echo PHP_EOL;
                    echo "-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-";
                    echo PHP_EOL;
                    echo "Dealer cards: ";
                    echo PHP_EOL;
                    foreach ($dealerCards as $dealerCard) {
                        echo $dealerCard->getDealersCards() . " " . $symbol;
                    }
                    echo PHP_EOL;
                    echo "-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-";
                    echo PHP_EOL;

                    if (getSumOfPlayerCards($playerCards) === 21 || getSumOfPlayerCards($playerCards) > getSumOfDealerCards($dealerCards) && getSumOfPlayerCards($playerCards) <= 21 || getSumOfDealerCards($dealerCards) > 21) {
                        echo "You won!";
                    } elseif (getSumOfPlayerCards($playerCards) === getSumOfDealerCards($dealerCards)) {
                        echo "It's a draw! ";
                    } elseif (getSumOfDealerCards($dealerCards) > getSumOfPlayerCards($playerCards) && getSumOfDealerCards($dealerCards) <= 21 || getSumOfDealerCards($dealerCards) === 21 || getSumOfPlayerCards($playerCards) > 21) {
                        echo "You lost! Dealer Won!";
                    }
                    echo PHP_EOL;
                    break;
                case 2:
                    $playerCardsOnHandThree = new Player($cards[array_rand($cards)]);
                    $playerCards = [$playerCardsOnHand, $playerCardsOnHandTwo, $playerCardsOnHandThree];
                    echo "Players cards: ";
                    echo PHP_EOL;
                    foreach ($playerCards as $playerCard) {
                        echo $playerCard->getPlayerCard() . " " . $symbol;
                    }
                    echo PHP_EOL;
                    $dealerCardsOnHandThree = new Dealer($cards[array_rand($cards)]);
                    $dealerCards = [$dealerCardsOnHand, $dealerCardsOnHandSecond, $dealerCardsOnHandThree];
                    echo "Dealers cards: ";
                    echo PHP_EOL;
                    foreach ($dealerCards as $dealerCard) {
                        echo $dealerCard->getDealersCards() . " " . $symbol;
                    }
                    echo PHP_EOL;
                    break;
                default:
                    exit;
            }
            break;
        default:
            exit;
    }
}