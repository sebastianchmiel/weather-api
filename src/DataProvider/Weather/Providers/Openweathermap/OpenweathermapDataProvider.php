<?php

namespace App\DataProvider\Weather\Providers\Openweathermap;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\DataProvider\Weather\WeatherDataProviderInterface;
use App\DataProvider\Weather\Providers\Openweathermap\DataConverter;
use App\Model\Weather\WeatherDataModel;

/**
 * openweathermap data provider
 *
 * @author Sebastian Chmiel
 */
class OpenweathermapDataProvider implements WeatherDataProviderInterface
{
    /**
     * param name in app with api key
     */
    const PARAM_API_KEY_NAME = 'openweathermap_api_key';
    
    /**
     * api base host
     */
    const API_HOST = 'http://api.openweathermap.org/data/2.5/';
    
    /**
     * api key
     * @var string
     */
    private $apiKey;
    
    /**
     * @var DataConverter
     */
    private $dataConverter;
    
    /**
     * @param ParameterBagInterface $parameterBag
     */
    public function __construct(ParameterBagInterface $parameterBag) {
        if (!$parameterBag->has(self::PARAM_API_KEY_NAME)) {
            throw new \InvalidArgumentException('API OpenWeatherMap missing api key');
        }
        
        $this->apiKey = $parameterBag->get(self::PARAM_API_KEY_NAME);
        
        $this->dataConverter = new DataConverter();
    }

    /**
     * get weather data for coordinates
     * 
     * @param float $lat
     * @param float $lng
     * 
     * @return WeatherDataModel
     */
    public function getWeatherData(float $lat, float $lng): WeatherDataModel {
        // prapare host with parameters
        $url = self::API_HOST . 'weather?lat='.$lat.'&lon='.$lng.'&appid='.$this->apiKey;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, false);

        $responseJson = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if (200 !== $httpCode) {
            throw new \Exception('API Openweathermap cannot get data');
        }
        
        return $this->dataConverter->convertWeatherData(json_decode($responseJson, true));
    }

}
