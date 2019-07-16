<?php

namespace App\Controller;

use App\Entity\Weather;
use App\Handler\WeatherGetDataHandler;

/**
 * Get weather data
 *
 * @author Sebastian Chmiel
 */
class WeatherGetData {
    
    /**
     * @var WeatherGetDataHandler
     */
    private $weatherGetDataHandler;
    
    /**
     * @param WeatherGetDataHandler $weatherGetDataHandler
     */
    public function __construct(WeatherGetDataHandler $weatherGetDataHandler)
    {
        $this->weatherGetDataHandler = $weatherGetDataHandler;
    }
    
    /**
     * handle request
     * 
     * @param Weather $data
     * 
     * @return Weather
     */
    public function __invoke(Weather $data): Weather
    {
        return $this->weatherGetDataHandler->handle($data);
    }
    
}
