<?php

class Car
{
    private string $name;
    private FuelGauge $fuelGauge;
    private Odometer $odometer;
    private array $tires;
    private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km
    private const TIRE_WEAR_PER_KM = [1, 2];
    private const LIGHTS_QUALITY_CLOSE = [1, 5];
    private const LIGHTS_QUALITY_FAR = [1, 3];
    private bool $started = false;
    private int $startCode;
    private array $closeLights;
    private array $farLights;

    public function __construct(string $name, int $startCode, int $fuelGaugeAmount)
    {
        $this->name = $name;
        $this->startCode = $startCode;
        $this->fuelGauge = new FuelGauge($fuelGaugeAmount);
        $this->odometer = new Odometer();
        $this->tires = [
            new Tire("Front Left Tire"),
            new Tire("Front Right Tire"),
            new Tire("Back Left Tire"),
            new Tire("Back Right: Tire")
        ];
        $this->closeLights = [
            new LightsClose("Front Left Close Light"),
            new LightsClose("Front Right close Lights"),
            new LightsClose("Back Left close Lights"),
            new LightsClose("Back Right close Lights")
        ];
        $this->farLights = [
          new LightsFar("Front Left Far Light"),
          new LightsFar("Front Right Far Lights"),
          new LightsFar("Back Right Far Lights"),
          new LightsFar("Back Left Far Lights")
        ];
    }

    public function hasTurnedOn(): bool
    {
        return $this->started;
    }

    public function start(int $startCode): void
    {
        if ($this->startCode === $startCode) {
            $this->started = true;
        }
    }

    public function drive(int $distance = 10): void
    {
        if ($this->fuelGauge->getFuel() <= 0) return;
        $this->fuelGauge->change($distance * -self::CONSUMPTION_PER_KM);
        $this->odometer->addMileage($distance);

        [$minQualityLoss, $maxQualityLoss] = self::TIRE_WEAR_PER_KM;
        [$minLoss, $maxLoss] = self::LIGHTS_QUALITY_CLOSE;
        [$qualityLossMin, $qualityLossMax] = self::LIGHTS_QUALITY_FAR;


        foreach ($this->tires as $tire) {
            $tire->decreaseQuality(rand($minQualityLoss * $distance, $maxQualityLoss * $distance));
        }
        foreach ($this->closeLights as $closeLight){
            $closeLight->decreaseQuality(rand($minLoss * $distance, $maxLoss * $distance));
        }
        foreach ($this->farLights as $lightsFar){
            $lightsFar->decreaseQuality(rand($qualityLossMin * $distance, $qualityLossMax * $distance));
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFuel(): float
    {
        return $this->fuelGauge->getFuel();
    }

    public function getMileage(): int
    {
        return $this->odometer->getMileage();
    }

    public function checkForValidTires(): bool
    {
        foreach ($this->tires as $tire) {
            if ($tire->getTireQuality() <= 0) {
                return false;
            }
        }
        return true;
    }

    public function getTires(): array
    {
        return $this->tires;
    }
    public function checkForValidLights(): bool{
        foreach ($this->closeLights as $closeLight){
            if($closeLight->getCloseLightsQuality() <= 0){
                return false;
            }
        }
        return true;
    }
    public function getCloseLights():array{
        return $this->closeLights;
    }

    public function checkForValidFarLights(): bool{
        foreach ($this->farLights as $lightsFar){
            if($lightsFar->getFarLightsQuality() <= 0){
                return false;
            }
        }
        return true;
    }
    public function getFarLights():array {
        return $this->farLights;
    }
}