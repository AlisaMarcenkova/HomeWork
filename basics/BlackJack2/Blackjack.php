<?php

class Blackjack{
    private Deck $deck;

    public function __construct(?Deck $deck = null)
    {
        $this->deck = $deck ?? new Deck();
    }
    public function deal(): Card{
        return $this->deck->draw();
    }
    public function getCardValue(Player $player):int{
        $sum = 0;
        foreach ($player->getCards() as $card){
            $sum += $card->getValue();
        }
        return $sum;
    }
}