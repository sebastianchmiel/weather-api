<?php

namespace App\DataProvider\Weather\Providers\Openweathermap;

use App\DataProvider\Weather\UnitRecognizerAbstract;

/**
 * Units recognizer
 *
 * @author Sebastian Chmiel
 */
class UnitRecognizer extends UnitRecognizerAbstract
{
    /**
     * celsus unit code
     */
    const UNIT_CELSIUS_CODE = 'metric';
    /**
     * fahrenheit unit code
     */
    const UNITS_FAHRENHEIT_CODE = 'imperial';
    
    /**
     * recognize unit code
     * 
     * @param string|null $unit
     * 
     * @return string
     */
    public function recognize(?string $unit): string
    {
        switch ($unit) {
            case UnitRecognizerAbstract::UNIT_FAHRENHEIT:
                return self::UNITS_FAHRENHEIT_CODE;
            case UnitRecognizerAbstract::UNIT_CELSIUS:
            default:
                return self::UNIT_CELSIUS_CODE;
        }
    }
}
