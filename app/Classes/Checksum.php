<?php

namespace App\Classes;

class Checksum
{
    /**
     * Luhn Algorithm validation
     *
     * @param string $number
     * @return bool
     */
    public static function luhn(string $number): bool
    {
        $sum = 0;
        $flag = 0;

        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $add = $flag++ & 1 ? $number[$i] * 2 : $number[$i];
            $sum += $add > 9 ? $add - 9 : $add;
        }

        return $sum % 10 === 0;
    }
}
