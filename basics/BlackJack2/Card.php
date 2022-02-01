<?php

class Card
{
    private string $suit;
    private string $symbol;

    public function __construct(string $suit, string $symbol)
    {
        $this->suit = $suit;
        $this->symbol = $symbol;
    }

    public function getValue(): int
    {
        if ($this->symbol == "J" || $this->symbol == "Q" || $this->symbol == "K" || $this->symbol == 'A') {
            return 10;
        }
        return (int) $this->symbol;
    }

    public function getDisplayValue(): string
    {
        return "{$this->symbol}.{$this->suit}";
    }
}