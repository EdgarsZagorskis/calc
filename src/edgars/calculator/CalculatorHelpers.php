<?php

namespace Edgars\Calculator;

/**
 * Class CalculatorHelpers
 * @package Edgars\Calculator
 */
class CalculatorHelpers
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
        return preg_replace('/[^\d\-\+\*\/]/', '', $expression);
    }

    /**
     * @param $expression
     * @return array
     * @throws CalculatorException
     */
    public static function split($expression)
    {
        $splits = preg_split('//', $expression, null, PREG_SPLIT_NO_EMPTY);
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
     * @throws CalculatorException
     */
    private static function checkSplitHealth(array $splits)
    {
        if (count($splits) < 3 || count($splits) % 2 == 0) {
            throw new CalculatorException('String is not a valid expression');
        }
    }


}