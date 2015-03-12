<?php

use Edgars\Calculator\Helpers;

/**
 * Class HelpersTest
 */
class HelpersTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function test_cleanUp_expression()
    {
        $this->assertEquals('1.3+3*3+1', Helpers::cleanUp('1.3 + 3 * 3 + 1'));
        $this->assertEquals('1+3*3+1', Helpers::cleanUp('a1 +   3 * ) (!@&$^!£$": 3 +1                             '));
    }

    /**
     *
     */
    public function test_split_expression()
    {
        //TODO Add check for checkSplitHealth
        $expression = '1.5+3*3+1';
        $splits = Helpers::split($expression);
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
        $this->assertTrue(Helpers::isNumber(1));
        $this->assertTrue(Helpers::isNumber('0'));
        $this->assertFalse(Helpers::isNumber('*'));
        $this->assertFalse(Helpers::isNumber('a'));
        $this->assertFalse(Helpers::isNumber(null));
    }

    /**
     *
     */
    public function test_isOperand()
    {
        $this->assertTrue(Helpers::isOperand('*'));
        $this->assertTrue(Helpers::isOperand('+'));
        $this->assertTrue(Helpers::isOperand('-'));
        $this->assertTrue(Helpers::isOperand('/'));
        $this->assertFalse(Helpers::isOperand(1));
        $this->assertFalse(Helpers::isOperand('0'));
        $this->assertFalse(Helpers::isOperand('('));
        $this->assertFalse(Helpers::isOperand('a'));
        $this->assertFalse(Helpers::isOperand(null));
    }


}