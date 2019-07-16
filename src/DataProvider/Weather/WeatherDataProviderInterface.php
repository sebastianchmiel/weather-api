<?php

namespace App\DataProvider\Weather;

use App\Model\Weather\WeatherDataModel;

/**
 * weather get data interface
 *
 * @author Sebastian Chmiel
 */
interface WeatherDataProviderInterface {
    /**
     * get weather data for coordinates
     * 
     * @param float $lat
     * @param float $lng
     * 
     * @return WeatherDataModel
     */
    public function getWeatherData(float $lat, float $lng): WeatherDataModel;
}
