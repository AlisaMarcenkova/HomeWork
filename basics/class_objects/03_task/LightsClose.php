<?php

class LightsClose
{
    private int $closeLightsQuality;
    private string $name;

    public function __construct(string $name, int $closeLightsQuality = 100){
        $this->name = $name;
        $this->closeLightsQuality = $closeLightsQuality;
    }

    public function getCloseLightsQuality(): int{
        return $this->closeLightsQuality;
    }
    public function decreaseQuality(int $percent){
        $this->closeLightsQuality -= $percent;
    }
    public function getName(): string
    {
        return $this->name;
    }
}