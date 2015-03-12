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
    public function test_run_can_cleanup()
    {
        $this->assertEquals('1+3*3+1', CalculatorHelpers::cleanUp('1 + 3 * 3 + 1'));
        $this->assertEquals('1+3*3+1', CalculatorHelpers::cleanUp('a1 +   3 * ) (!@&$^!£$": 3 +1                             '));
    }

    public function test_split_expression()
    {
        $expression = '1+3*3+1';
        $splits = CalculatorHelpers::split($expression);
        $this->assertEquals(7, count($splits));
        $this->assertEquals(1, $splits[0]);
        $this->assertEquals('+', $splits[1]);
        $this->assertEquals(3, $splits[2]);
        $this->assertEquals('*', $splits[3]);
        $this->assertEquals(3, $splits[4]);
        $this->assertEquals('+', $splits[5]);
        $this->assertEquals(1, $splits[6]);
    }



}