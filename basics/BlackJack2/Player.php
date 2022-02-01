<?php

class Player{
    private array $cards = [];
    private bool $hold = false;

    public function getHold(): bool{
        return $this->hold;
    }
    public function setHold():void{
        $this->hold = !$this->hold;
    }
    public function getCards():array{
        return $this->cards;
    }
    public function addCard(Card $card):void {
        $this->cards[] = $card;
    }
}