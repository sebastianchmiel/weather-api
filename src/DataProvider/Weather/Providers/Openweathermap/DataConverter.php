<?php

namespace App\DataProvider\Weather\Providers\Openweathermap;

use App\Model\Weather\WeatherDataModel;

/**
 * Convert data from api to model
 *
 * @author Sebastian Chmiel
 */
class DataConverter 
{
    /**
     * convert weather raw data from api to model
     * 
     * @param array $data
     * 
     * @return WeatherDataModel
     */
    public function convertWeatherData(array $data): WeatherDataModel 
    {
        return (new WeatherDataModel())
                ->setCity($data['name'] ?? null)
                ->setTemperature($data['main']['temp'] ?? null)
                ->setClouds($data['clouds']['all'] ?? null)
                ->setWindSpeed($data['wind']['speed'] ?? 0)
                ->setWindDeg($data['wind']['deg'] ?? 0)
                ->setDescription($data['weather'][0]['description'] ?? null)
                ->setIcon(isset($data['weather'][0]['icon']) ? 'https://openweathermap.org/img/wn/'.$data['weather'][0]['icon'].'@2x.png' : null);
    }
}
