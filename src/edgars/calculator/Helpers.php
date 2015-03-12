<?php

namespace Edgars\Calculator;

/**
 * Class Helpers
 * @package Edgars\Calculator
 */
class Helpers
{
    /**
     * @var array
     */
    private static $supportedOperands = array('/', '*', '-', '+');

    /**
     * @param $expression
     * @return mixed
     */
    public static function cleanUp($expression)
    {
        return preg_replace('/[^\d\.\-\+\*\/]/', '', $expression);
    }

    /**
     * @param $expression
     * @return array
     * @throws Exception
     */
    public static function split($expression)
    {
        $splits = preg_split('/([\-\+\*\/])/', $expression, null, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
        self::checkSplitHealth($splits);
        return $splits;
    }

    /**
     * @param $operand
     * @return bool
     */
    public static function isOperand($operand)
    {
        return in_array($operand, self::$supportedOperands);
    }

    /**
     * @param $number
     * @return bool
     */
    public static function isNumber($number)
    {
        return is_numeric($number);
    }

    /**
     * There must be at least 3 splits and it should be odd number
     * @param array $splits
     * @throws Exception
     */
    private static function checkSplitHealth(array $splits)
    {
        if (count($splits) < 3 || count($splits) % 2 == 0) {
            throw new Exception('String is not a valid expression');
        }
    }


}