<?php

use Edgars\Calculator\Calculator;

class CalculatorTest extends PHPUnit_Framework_TestCase
{

    public function test_instance_of_CalculatorInterface()
    {
        $calculator = new Calculator();
        $this->assertInstanceOf('Edgars\Calculator\CalculatorInterface', $calculator);
    }

    public function test_has_run()
    {
        $calculator = new Calculator();
        $this->assertTrue(method_exists($calculator, 'run'));
    }


    public function test_run_returns_value()
    {
    }


}