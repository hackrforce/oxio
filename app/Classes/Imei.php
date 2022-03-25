<?php

namespace App\Classes;

use Illuminate\Support\Str;
use Exception;

class Imei
{
    /**
     * IMEI input validation
     *
     * Check IMEI input based on predefined validation rules.
     *
     * @param string $imei
     * @return array
     */
    public static function validate(string $imei): array
    {
        try {
            // Could break these individual validation checks
            // into individual private class functions
            // But directions imply desire for a compact/singular function

            // Validation requirement: 15 digits in length
            if(strlen($imei) != 15) {
                throw new Exception("Invalid length");
            }

            // Validation requirement: numeric input
            if(!is_numeric($imei)) {
                throw new Exception("Invalid type: non-numeric");
            }

            // Validation requirement: Luhn algorithm checksum
            if(!Checksum::luhn($imei)) {
                throw new Exception("Invalid checksum");
            }

            // Result (1): Type Allocation Code (TAC) is 8 digits in length
            // Result (2): Serial Number is 6 digits in length
            // Result (3): Checksum is calculated as Luhn algorithm and 1 digit in length
            return [
                'success' => true,
                'typeAllocationCode' => Str::substr($imei, 0, 8),
                'serialiNumber' => Str::substr($imei, 8, 6),
                'checksum' => Str::substr($imei, 14, 1),
            ];

        } catch (Exception $exception) {
            return [
                'success' => false,
                'error' => [$exception->getMessage()],
            ];
        }
    }
}
