<?php

namespace App\DataProvider\Weather;

/**
 * Abstract unit recognizer
 *
 * @author Sebastian Chmiel
 */
class UnitRecognizerAbstract {
    /**
     * celsius
     */
    const UNIT_CELSIUS = 'celsius';
    /**
     * fahrenheit
     */
    const UNIT_FAHRENHEIT = 'fahrenheit';
    
    /**
     * recognize unit code
     * 
     * @param string|null $unit
     * 
     * @return string
     */
    public function recognize(?string $unit): string {
        return self::UNIT_CELSIUS;
    }
}
