<?php

class Tire
{
    private int $tireQuality;
    private string $name;

    public function __construct(string $name, int $tireQuality = 100){
        $this->name = $name;
        $this->tireQuality = $tireQuality;
    }

    public function getTireQuality(): int{
        return $this->tireQuality;
    }
    public function decreaseQuality(int $percent){
        $this->tireQuality -= $percent;
    }
    public function getName(): string
    {
        return $this->name;
    }
}