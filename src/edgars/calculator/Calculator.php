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
    private $value = 0.0;
    private $maxLoops = 10;

    /**
     * @param $expression
     * @return float
     */
    public function run($expression)
    {
        $expression = CalculatorHelpers::cleanUp($expression);
        $this->setArrExpression(CalculatorHelpers::split($expression));
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

    public function processSplits(array $processableOperands)
    {
        foreach ($this->arrExpression as $key => $item) {
            if (in_array($item, $processableOperands) && $this->processSplit($item, $key)) {
                $this->processSplits($processableOperands);
                break;
            }
        }
//        // aaaaaaannnnndddd... go again...
//        if ($this->maxLoops-- > 0 && count($this->arrExpression) >= 3) {
//            $this->processSplits($processableOperands);
//        }
    }

    /**
     * @param $item
     * @param $key
     * @return boolean If true, it means that expression was processed and string should be processed from the beginning again
     * @throws DividedByZeroException
     */
    private function processSplit($item, $key)
    {
        $foundValue = false;
        if (
            ($key > 0) &&           // not supporting operands in the beginning of the string
            ($key % 2 == 1) &&      // if supporting odd operands. expression is assumed to be a+b...
            ($key < count($this->arrExpression) - 1) &&    // not supporting operands in the end of the string
            CalculatorHelpers::isOperand($item)   // supporting only operands
        ) {
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

    /**
     * @param array $arrExpression
     */
    private function setArrExpression(array $arrExpression)
    {
        $this->arrExpression = $arrExpression;
    }


}