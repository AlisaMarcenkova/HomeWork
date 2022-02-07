<?php

class BlackPeter{
    private Deck $deck;

    public function __construct()
    {
        $this->deck = new Deck();
    }
    public function getDeck(){
        return $this->deck;
    }
    public function deal(): Card{
        return $this->deck->draw();
    }
    public static function equals(Card $firstCard, Card $secondCard): bool{
        return $firstCard->getSymbol() === $secondCard->getSymbol();
    }
    public function getWinner(Player $playerOne, Player $playerTwo){
        if($playerOne->getCards() == 0){
            echo "Player1 won!";
        }elseif ($playerTwo->getCards() == 0){
            echo "Player2 won!";
        }
    }
}