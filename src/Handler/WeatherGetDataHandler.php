<?php

namespace App\Handler;

use App\Entity\Weather;
use App\Repository\WeatherRepository;
use App\DataProvider\Weather\WeatherDataProviderInterface;

/**
 * Handler for get weather data
 *
 * @author Sebastian Chmiel
 */
class WeatherGetDataHandler {
    
    /**
     * @var WeatherRepository
     */
    private $repository;
    
    /**
     * @var WeatherDataProviderInterface
     */
    private $dataProvider;
    
    /**
     * @param WeatherRepository $repository
     * @param WeatherDataProviderInterface $dataProvider
     */
    public function __construct(WeatherRepository $repository, WeatherDataProviderInterface $dataProvider)
    {
        $this->repository = $repository;
        $this->dataProvider = $dataProvider;
    }
    
    /**
     * @param Weather $weather
     * 
     * @return Weather
     * 
     * @throws \Exception
     */
    public function handle(Weather $weather): Weather
    {
        // get data
        try {
            $data = $this->dataProvider->getWeatherData($weather->getLat(), $weather->getLng());
        } catch (\Exception $ex) {
            throw new \Exception('Cannot get weather data');
        }
        
        // update entity
        $weather->setCreateDatetime(new \DateTime('now'))
                ->setCity($data->getCity())
                ->setTemperature($data->getTemperature())
                ->setClouds($data->getClouds())
                ->setWindSpeed($data->getWindSpeed())
                ->setWindDeg($data->getWindDeg())
                ->setDescription($data->getDescription())
                ->setIcon($data->getIcon())
                ;
        
        return $weather;
    }
}
