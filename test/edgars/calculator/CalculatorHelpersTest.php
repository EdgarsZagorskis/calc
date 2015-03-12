<?php

use Edgars\Calculator\CalculatorHelpers;

/**
 * Class CalculatorHelpersTest
 */
class CalculatorHelpersTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function test_cleanUp_expression()
    {
        $this->assertEquals('1.3+3*3+1', CalculatorHelpers::cleanUp('1.3 + 3 * 3 + 1'));
        $this->assertEquals('1+3*3+1', CalculatorHelpers::cleanUp('a1 +   3 * ) (!@&$^!£$": 3 +1                             '));
    }

    /**
     *
     */
    public function test_split_expression()
    {
        //TODO Add check for checkSplitHealth
        $expression = '1.5+3*3+1';
        $splits = CalculatorHelpers::split($expression);
        $this->assertEquals(7, count($splits));
        $this->assertEquals(1.5, $splits[0]);
        $this->assertEquals('+', $splits[1]);
        $this->assertEquals(3, $splits[2]);
        $this->assertEquals('*', $splits[3]);
        $this->assertEquals(3, $splits[4]);
        $this->assertEquals('+', $splits[5]);
        $this->assertEquals(1, $splits[6]);
    }


    /**
     *
     */
    public function test_isNumber()
    {
        $this->assertTrue(CalculatorHelpers::isNumber(1));
        $this->assertTrue(CalculatorHelpers::isNumber('0'));
        $this->assertFalse(CalculatorHelpers::isNumber('*'));
        $this->assertFalse(CalculatorHelpers::isNumber('a'));
        $this->assertFalse(CalculatorHelpers::isNumber(null));
    }

    /**
     *
     */
    public function test_isOperand()
    {
        $this->assertTrue(CalculatorHelpers::isOperand('*'));
        $this->assertTrue(CalculatorHelpers::isOperand('+'));
        $this->assertTrue(CalculatorHelpers::isOperand('-'));
        $this->assertTrue(CalculatorHelpers::isOperand('/'));
        $this->assertFalse(CalculatorHelpers::isOperand(1));
        $this->assertFalse(CalculatorHelpers::isOperand('0'));
        $this->assertFalse(CalculatorHelpers::isOperand('('));
        $this->assertFalse(CalculatorHelpers::isOperand('a'));
        $this->assertFalse(CalculatorHelpers::isOperand(null));
    }


}