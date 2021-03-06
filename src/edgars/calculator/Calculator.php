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
        $expression = Helpers::cleanUp($expression);
        $this->setArrExpression(Helpers::split($expression));
        $this->processSplits(array('*', '/'));
        $this->processSplits(array('-', '+'));
        return $this->cleanUpAndReturnValue();
    }

    /**
     * @return float
     */
    public function cleanUpAndReturnValue()
    {
        $value = $this->arrExpression[0];
        $this->arrExpression = array();
        return $value;
    }

    /**
     * @param array $processableOperands
     */
    public function processSplits(array $processableOperands)
    {
        foreach ($this->arrExpression as $key => $item) {
            if (in_array($item, $processableOperands) && $this->processSplit($item, $key)) {
                $this->processSplits($processableOperands);
                break;
            }
        }
    }

    /**
     * @param $item
     * @param $key
     * @return boolean If true, it means that expression was processed and string should be processed from the beginning again
     * @throws ExceptionDividedByZero
     */
    private function processSplit($item, $key)
    {
        $foundValue = false;
        if ($this->isAValidKeyForProcessing($key)) {
            switch ($item) {
                case '+' :
                    $value = Math::add($this->arrExpression[($key - 1)], $this->arrExpression[($key + 1)]);
                    break;
                case '-':
                    $value = Math::subtract($this->arrExpression[($key - 1)], $this->arrExpression[($key + 1)]);
                    break;
                case '/':
                    $value = Math::divide($this->arrExpression[($key - 1)], $this->arrExpression[($key + 1)]);
                    break;
                case '*':
                    $value = Math::multiply($this->arrExpression[($key - 1)], $this->arrExpression[($key + 1)]);
                    break;
            }
            if (isset($value)) {
                array_splice($this->arrExpression, $key - 1, 3, $value);
                $foundValue = true;
            }
        }
        return $foundValue;
    }

    private function isAValidKeyForProcessing($key)
    {
        return ($key > 0) &&           // not supporting operands in the beginning of the string
        ($key % 2 == 1) &&      // if supporting odd operands. expression is assumed to be a+b...
        ($key < count($this->arrExpression) - 1) &&    // not supporting operands in the end of the string
        Helpers::isOperand($this->arrExpression[$key]);   // supporting only operands
    }

    /**
     * @param array $arrExpression
     */
    private function setArrExpression(array $arrExpression)
    {
        $this->arrExpression = $arrExpression;
    }


}