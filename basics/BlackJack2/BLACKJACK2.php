<?php

require_once 'BlackJack2/Card.php';
require_once 'BlackJack2/Deck.php';
require_once 'BlackJack2/Blackjack.php';
require_once 'BlackJack2/Player.php';

$blackjack = new Blackjack();
$player = new Player();
$dealer = new Player();

$player->addCard($blackjack->deal());
$dealer->addCard($blackjack->deal());

while(true){
    showCards($player->getCards());
    showHiddenCards($dealer->getCards());
    echo "[1] Hold the card: ";
    echo PHP_EOL;
    echo "[2] Pick a card: ";
    echo PHP_EOL;
    if(!$player->getHold()){
        $option = (int)readline("Select an option: ");
        switch ($option){
            case 1:
                $player->setHold();
                echo "Hold";
                echo PHP_EOL;
                break;
            case 2:
                $player->addCard($blackjack->deal());
                break;
            default:
                echo "Something went wrong!";
                echo PHP_EOL;
        }
    }
    if(!$dealer->getHold()){
        if($blackjack->getCardValue($dealer) < 17){
            $dealer->addCard($blackjack->deal());
        }else{
            $dealer->setHold();
        }
    }
    if($player->getHold() && $dealer->getHold()){
        echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=";
        echo PHP_EOL;
        echo "Player cards total sum: " . $blackjack->getCardValue($player);
        echo PHP_EOL;
        echo "Dealer cards total sum: " . $blackjack->getCardValue($dealer);
        echo PHP_EOL;
        echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=";
        echo PHP_EOL;
        echo "Player cards: ";
        showCards($player->getCards()) . PHP_EOL;
        echo "Dealer cards: ";
        showCards($dealer->getCards()) . PHP_EOL;

        if($blackjack->getCardValue($player) == $blackjack->getCardValue($dealer)){
            echo "It's a tie!";
            echo PHP_EOL;
        }
        if($blackjack->getCardValue($player) > $blackjack->getCardValue($dealer)){
            if($blackjack->getCardValue($player) > 21){
                echo "Dealer won!" . PHP_EOL;
            }else{
                echo "You won!" . PHP_EOL;
            }
        }else{
            if ($blackjack->getCardValue($dealer) > 21){
                echo "You won!" . PHP_EOL;
            }else{
                echo "Dealer won!" . PHP_EOL;
            }
        }
        exit;
    }
}


function showCards(array $playerCards): void{
    foreach ($playerCards as $card){
        echo $card->getDisplayValue();
    }echo PHP_EOL;
}

function showHiddenCards(array $playerCards): void{
    foreach ($playerCards as $card){
        echo "[X]";
    }echo PHP_EOL;
}