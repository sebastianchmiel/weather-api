<?php

namespace App\Controller;

use App\Entity\Weather;

/**
 * Get weather data
 *
 * @author Sebastian Chmiel
 */
class WeatherGetData {
    
    public function __invoke(Weather $data): Weather
    {
        //$this->weaterGetDataHandler->handle($data);
        
        return $data;
    }
    
}
