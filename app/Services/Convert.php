<?php

namespace App\Services;

class Convert
{
    // convert to percent
    public static function toPercent(int $a, int $b): string
    {
        return (string)(round($a * 100 / $b, 2) . "%");
    }

    // if last char is s remove it
    public static function removeS(string $str): string
    {
        if ($str[strlen($str) - 1] == 's') {
            return substr($str, 0, -1);
        }
        return $str;
    }
}