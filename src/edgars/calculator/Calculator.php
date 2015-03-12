<?php

namespace Edgars\Calculator;

/**
 * Class Calculator
 * @package Edgars\Calculator
 */
class Calculator implements CalculatorInterface
{

    /**
     * @var array
     */
    private $arrExpression = array();

    /**
     * @param $expression
     * @return float
     */
    public function run($expression)
    {
        $expression = CalculatorHelpers::cleanUp($expression);
        $this->setArrExpression(CalculatorHelpers::split($expression));
        return $this->processSplits();
    }

    /**
     * @param array $arrExpression
     */
    public function setArrExpression(array $arrExpression)
    {
        $this->arrExpression = $arrExpression;
    }


    /**
     *
     */
    public function processSplits()
    {
        $value = 0.0;
        foreach ($this->arrExpression as $key => $item) {
            $value += $this->processSplit($item, $key);
        }
        return $value;
    }

    /**
     * @param $item
     * @param $key
     * @return int
     * @throws DividedByZeroException
     */
    private function processSplit($item, $key)
    {
        $value = 0;
        $k = ($key % 2 );
        // Even key (larger than zero)
        if (($key > 0) && ($key % 2 == 1) && ($key<count($this->arrExpression)-1) &&  CalculatorHelpers::isOperand($item)) {
            switch ($item) {
                case '+':
                    $value += Math::add($this->arrExpression[($key - 1)], $this->arrExpression[($key + 1)]);
                    break;
                case '-':
                    $value += Math::subtract($this->arrExpression[($key - 1)], $this->arrExpression[($key + 1)]);
                    break;
                case '/':
                    $value += Math::divide($this->arrExpression[($key - 1)], $this->arrExpression[($key + 1)]);
                    break;
                case '*':
                    $value += Math::multiply($this->arrExpression[($key - 1)], $this->arrExpression[($key + 1)]);
                    break;
            }
        }
        return $value;
    }


}