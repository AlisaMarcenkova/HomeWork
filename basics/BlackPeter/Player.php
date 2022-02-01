<?php

class Player
{
    private array $cards = [];

    public function getCards(): array
    {
        return $this->cards;
    }

    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function hasPairCards(): bool
    {
        $symbols = [];
        foreach ($this->cards as $card) {
            $symbols[] = $card->getSymbol();
        }

        $uniqueCardsCount = array_count_values($symbols);

        foreach ($uniqueCardsCount as $count) {
            if ($count > 2) return true;
        }
        return false;
    }

    public function disband()
    {
        $symbols = [];

        foreach ($this->cards as $card) {
            $symbols[] = $card->getSymbol() ;
        }

        $uniqueCardsCount = array_count_values($symbols);

        foreach ($uniqueCardsCount as $symbol => $count) {
            if ($count === 1) continue;
            if ($count === 2 || $count === 4) {
                foreach ($this->cards as $index => $card){
                    if($card->getSymbol() === (string)$symbol && $card->getSuit() === '♣' && $card->getSuit() === '♠' || $card->getSymbol() === (string)$symbol && $card->getSuit() === '♥' && $card->getSuit() === '♦'){
                        unset($this->cards[$index]);
                    }
                }
            }
            if ($count === 3) {
                for ($i = 0; $i < 2; $i++){
                    foreach ($this->cards as $index => $card){
                        if($card->getSymbol() === (string)$symbol && $card->getSuit() === '♣' && $card->getSuit() === '♠' || $card->getSymbol() === (string)$symbol && $card->getSuit() === '♥' && $card->getSuit() === '♦'){
                            unset($this->cards[$index]);
                            break;
                        }
                    }
                }
            }
        }
    }
}