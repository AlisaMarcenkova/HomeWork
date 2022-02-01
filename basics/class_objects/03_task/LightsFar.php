<?php

class LightsFar
{
    private int $farLightsQuality;
    private string $name;

    public function __construct(string $name, int $farLightsQuality = 100){
        $this->name = $name;
        $this->farLightsQuality = $farLightsQuality;
    }

    public function getFarLightsQuality(): int{
        return $this->farLightsQuality;
    }
    public function decreaseQuality(int $percent){
        $this->farLightsQuality -= $percent;
    }
    public function getName(): string
    {
        return $this->name;
    }
}