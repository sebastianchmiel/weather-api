<?php

namespace App\Model\Stats;

/**
 * Stats model
 *
 * @author Sebastian Chmiel
 */
class StatsModel 
{
    /**
     * @var float|null
     */
    private $temperatureMin;
    
    /**
     * @var float|null
     */
    private $temperatureMax;
    
    /**
     * @var float|null
     */
    private $temperatureAvg;

    /**
     * @var string|null
     */
    private $mostSearchedCity;
        
    /**
     * @var int|null
     */
    private $totalSearchesCount;
    
    /**
     * @param float|null $temperatureMin
     * @return void
     */
    public function setTemperatureMin(?float $temperatureMin): void 
    {
        $this->temperatureMin = $temperatureMin;
    }
    
    /**
     * @param float|null $temperatureMax
     * @return void
     */
    public function setTemperatureMax(?float $temperatureMax): void 
    {
        $this->temperatureMax = $temperatureMax;
    }
    
    /**
     * @param float|null $temperatureAvg
     * @return void
     */
    public function setTemperatureAvg(?float $temperatureAvg): void 
    {
        $this->temperatureAvg = $temperatureAvg;
    }
    
    /**
     * @param string|null $mostSearchedCity
     * @return void
     */
    public function setMostSearchedCity(?string $mostSearchedCity): void 
    {
        $this->mostSearchedCity = $mostSearchedCity;
    }
    
    /**
     * @param int|null $totalSearchesCount
     * @return void
     */
    public function setTotalSearchesCount(?int $totalSearchesCount): void 
    {
        $this->totalSearchesCount = $totalSearchesCount;
    }
    
    /**
     * get data as array
     * @return array
     */
    public function toArray(): array 
    {
        return [
            'temperature' => [
                'min' => $this->temperatureMin,
                'max' => $this->temperatureMax,
                'avg' => $this->temperatureAvg,
            ],
            'mostSearchedCity' => $this->mostSearchedCity,
            'totalSearchesCount' => $this->totalSearchesCount,
        ];
    }
}
