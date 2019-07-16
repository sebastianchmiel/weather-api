<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\WeatherGetData;

/**
 * @ApiResource(
 *     collectionOperations={
 *          "get",
 *          "post"={
 *              "method"="POST",
 *              "path"="/weathers/get-data",
 *              "controller"=WeatherGetData::class,
 *          }
 *     },
 *     itemOperations={
 *          "get"
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\WeatherRepository")
 */
class Weather
{
    /**
     * @var int The id of history
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \DateTimeInterface Search datetime
     *
     * @ORM\Column(type="datetime")
     */
    private $createDatetime;

    /**
     * @var float lat
     *
     * @ORM\Column(type="decimal", precision=9, scale=6)
     */
    private $lat;
    
    /**
     * @var float lng
     *
     * @ORM\Column(type="decimal", precision=9, scale=6)
     */
    private $lng;

    /**
     * @var string City name
     *
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @var float temperature
     *
     * @ORM\Column(type="float")
     */
    private $temperature;
    
    /**
     * @var int clouds
     *
     * @ORM\Column(type="smallint")
     */
    private $clouds;

    /**
     * @var float wind speed
     *
     * @ORM\Column(type="float")
     */
    private $windSpeed;

    /**
     * @var float wind degrees
     *
     * @ORM\Column(type="float")
     */
    private $windDeg;

    /**
     * @var string description
     *
     * @ORM\Column(type="string", length=255)
     */
    private $description;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreateDatetime(): ?\DateTimeInterface
    {
        return $this->createDatetime;
    }

    public function setCreateDatetime(\DateTimeInterface $createDatetime): self
    {
        $this->createDatetime = $createDatetime;

        return $this;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): float
    {
        return $this->lng;
    }

    public function setLng(float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getClouds(): ?int
    {
        return $this->clouds;
    }

    public function setClouds(int $clouds): self
    {
        $this->clouds = $clouds;

        return $this;
    }

    public function getWindSpeed(): ?float
    {
        return $this->windSpeed;
    }

    public function setWindSpeed(float $windSpeed): self
    {
        $this->windSpeed = $windSpeed;

        return $this;
    }

    public function getWindDeg(): ?float
    {
        return $this->windDeg;
    }

    public function setWindDeg(float $windDeg): self
    {
        $this->windDeg = $windDeg;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    

}
