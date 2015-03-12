<?php
namespace Edgars\Calculator;

class Math implements MathInterface
{
    public static function add($val1, $val2)
    {
        return floatval($val1) + floatval($val2);

    }

    public static function subtract($val1, $val2)
    {
        return floatval($val1) - floatval($val2);

    }

    public static function multiply($val1, $val2)
    {
        return floatval($val1) * floatval($val2);
    }

    public static function divide($val1, $val2)
    {
        $isVal2Zero = floatval($val2) === 0.0;
        if ($isVal2Zero) {
            throw new DividedByZeroException();
        } else {
            $returnValue = floatval($val1) / floatval($val2);
        }
        return $returnValue;
    }

}