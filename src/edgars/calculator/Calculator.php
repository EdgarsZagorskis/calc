<?php

namespace Edgars\Calculator;

/**
 * Class Calculator
 * @package Edgars\Calculator
 */
class Calculator implements CalculatorInterface
{

private $arrExpression = array();

    public function run($expression)
    {
        $expression = CalculatorHelpers::cleanUp($expression);
        $this->arrExpression = CalculatorHelpers::split($expression);
        return $this->processSplits();
    }

    public function processSplits()
    {

        $value = 0;
        foreach ($this->arrExpression as $key=>$split){
//            if (C)
        }
        array_walk($this->arrExpression, 'self::processSplit');


        return $value;

    }

    private static function processSplit($item, $key)
    {
               return 0;
    }


}