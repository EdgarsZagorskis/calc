<?php

namespace Edgars\Calculator;

/**
 * Class CalculatorHelpers
 * @package Edgars\Calculator
 */
class CalculatorHelpers
{

    /**
     * @param $expression
     * @return mixed
     */
    public static function cleanUp($expression)
    {
        return preg_replace('/[^\d\-\+\*\/]/', '', $expression);
    }

    public static function split($expression)
    {
        $splits = preg_split('//', $expression, null, PREG_SPLIT_NO_EMPTY);
        return $splits;
    }


}