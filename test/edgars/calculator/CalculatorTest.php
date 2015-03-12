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

    public function test_returns_value(){
        $calculator = new Calculator();
        $this->assertEquals(7, $calculator->run('1 + 1 * 3 +1'));
    }

  }