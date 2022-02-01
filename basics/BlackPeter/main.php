<?php

require_once 'BlackPeter/Deck.php';
require_once 'BlackPeter/Card.php';
require_once 'BlackPeter/Player.php';
require_once 'BlackPeter/BlackPeter.php';

$game = new BlackPeter();
$playerOne = new Player();
$playerTwo = new Player();

for ($i = 0; $i < 25; $i++){
    $playerOne->addCard($game->deal());
}
for ($i = 0; $i < 24; $i++){
    $playerTwo->addCard($game->deal());
}
echo "PlayerOne cards: ";
foreach ($playerOne->getCards() as $card){
    echo $card->getDisplayValue() . ' ';
}
echo PHP_EOL;
echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=";
echo PHP_EOL;
echo "PlayerTwo cards: ";
foreach ($playerTwo->getCards() as $card){
    echo $card->getDisplayValue() . ' ';
}
echo PHP_EOL;

echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=";
echo PHP_EOL;
$playerOne->disband();
echo "Cards after disband: ";
echo PHP_EOL;
echo "PlayerOne cards: ";
foreach ($playerOne->getCards() as $card){
    echo $card->getDisplayValue() . ' ';
}
echo PHP_EOL;
echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=";
echo PHP_EOL;

$playerTwo->disband();
echo "PlayerTwo cards: ";
foreach ($playerTwo->getCards() as $card){
    echo $card->getDisplayValue() . ' ';
}
echo PHP_EOL;


//var_dump(count($game->getDeck()->getCards()));

//$playerOne->addCard($game->deal());
//$playerTwo->addCard($game->deal());
//
//function showCards(array $playerCards): void
//{
//    foreach ($playerCards as $card) {
//        echo $card->getDisplayValue();
//    }
//    echo PHP_EOL;
//}
//
////$playerOne = [
////    $deck->draw(),
////    $deck->draw(),
////    $deck->draw()
////];
////
////$playerTwo = $deck->draw();
//$computerTakeAway = $deck->draw();
//
//echo "Player1 cards: ";
//showCards($playerOne->getCards());
//echo "-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=";
//echo PHP_EOL;
//echo "Player2 cards: ";
//showCards($playerTwo->getCards());
//echo "-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=";
//echo PHP_EOL;
//echo "Computer takes away one card";
//echo PHP_EOL;