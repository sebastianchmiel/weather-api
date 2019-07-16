<?php

namespace App\Model\Weather;
/**
 * WeatherDataModel
 *
 * @author Sebastian Chmiel
 */
class WeatherDataModel {
    /**
     * @var string City name
     */
    private $city;

    /**
     * @var float temperature
     */
    private $temperature;
    
    /**
     * @var int clouds
     */
    private $clouds;

    /**
     * @var float wind speed
     */
    private $windSpeed;

    /**
     * @var float wind degrees
     */
    private $windDeg;

    /**
     * @var string description
     */
    private $description;


    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(?float $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getClouds(): ?int
    {
        return $this->clouds;
    }

    public function setClouds(?int $clouds): self
    {
        $this->clouds = $clouds;

        return $this;
    }

    public function getWindSpeed(): ?float
    {
        return $this->windSpeed;
    }

    public function setWindSpeed(?float $windSpeed): self
    {
        $this->windSpeed = $windSpeed;

        return $this;
    }

    public function getWindDeg(): ?float
    {
        return $this->windDeg;
    }

    public function setWindDeg(?float $windDeg): self
    {
        $this->windDeg = $windDeg;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
