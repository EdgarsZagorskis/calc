<?php
namespace Edgars\Calculator;

/**
 * Class Math
 * @package Edgars\Calculator
 */
class Math implements MathInterface
{
    /**
     * @param $val1
     * @param $val2
     * @return float
     */
    public static function add($val1, $val2)
    {
        return floatval($val1) + floatval($val2);

    }

    /**
     * @param $val1
     * @param $val2
     * @return float
     */
    public static function subtract($val1, $val2)
    {
        return floatval($val1) - floatval($val2);

    }

    /**
     * @param $val1
     * @param $val2
     * @return float
     */
    public static function multiply($val1, $val2)
    {
        return floatval($val1) * floatval($val2);
    }

    /**
     * @param $val1
     * @param $val2
     * @return float
     * @throws ExceptionDividedByZero
     */
    public static function divide($val1, $val2)
    {
        $isVal2Zero = floatval($val2) === 0.0;
        if ($isVal2Zero) {
            throw new ExceptionDividedByZero();
        } else {
            $returnValue = floatval($val1) / floatval($val2);
        }
        return $returnValue;
    }

}