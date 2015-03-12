<?php

use Edgars\Calculator\Calculator;

/**
 * Class CalculatorTest
 */
class CalculatorTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function test_instance_of_CalculatorInterface()
    {
        $calculator = new Calculator();
        $this->assertInstanceOf('Edgars\Calculator\CalculatorInterface', $calculator);
    }

    /**
     *
     */
    public function test_has_run()
    {
        $calculator = new Calculator();
        $this->assertTrue(method_exists($calculator, 'run'));
    }

    /**
     *
     */
    public function test_process_simple_expressions()
    {
        $calculator = new Calculator();
        $this->assertEquals(6, $calculator->run('3+3'));
        $this->assertEquals(9, $calculator->run('3*3'));
        $this->assertEquals(1, $calculator->run('3/3'));
        $this->assertEquals(0, $calculator->run('3-3'));
    }

    /**
     *
     */
    public function test_process_witty_expressions()
    {
        $calculator = new Calculator();
        $this->assertEquals(5, $calculator->run('1 + 1 * 3 +1'));
        $this->assertEquals(11, $calculator->run('1 + 3 * 3 +1'));
        $this->assertEquals(4, $calculator->run('2 *10 /5'));
    }

}