<?php

use Edgars\Calculator\Math as Math;

class MathTest extends PHPUnit_Framework_TestCase
{

    public function test_instance_of_MathInterface()
    {
        $calculator = new Math();
        $this->assertInstanceOf('Edgars\Calculator\MathInterface', $calculator);
    }

    public function test_has_common_methods()
    {
        $calculator = new Math();
        $this->assertTrue(method_exists($calculator, 'add'));
        $this->assertTrue(method_exists($calculator, 'divide'));
        $this->assertTrue(method_exists($calculator, 'subtract'));
        $this->assertTrue(method_exists($calculator, 'multiply'));
    }


    public function test_can_multiply_values()
    {
        $this->assertEquals(9, Math::multiply(3, 3));
        $this->assertEquals(9, Math::multiply('3', '3'));
        $this->assertEquals(9, Math::multiply('4.5', 2));
    }

    public function test_can_multiply_treats_nulls_and_nonnumbers_by_using_floatval()
    {
        $this->assertEquals(0, Math::multiply('4', null));
        $this->assertEquals(0, Math::multiply('4', 'a'));
        $this->assertEquals(0, Math::multiply('4', '*'));
    }

    public function test_can_add_values()
    {
        $this->assertEquals(6, Math::add(3, 3));
        $this->assertEquals(6, Math::add('3', '3'));
        $this->assertEquals(6.5, Math::add('4.5', 2));
    }

    public function test_can_add_treats_nulls_and_nonnumbers_by_using_floatval()
    {
        $this->assertEquals(4, Math::add('4', null));
        $this->assertEquals(4, Math::add('4', 'a'));
        $this->assertEquals(4, Math::add('4', '*'));
    }

    public function test_can_subtract_values()
    {
        $this->assertEquals(0, Math::subtract(3, 3));
        $this->assertEquals(0, Math::subtract('3', '3'));
        $this->assertEquals(2.5, Math::subtract('4.5', 2));
    }

    public function test_can_subtract_treats_nulls_and_nonnumbers_by_using_floatval()
    {
        $this->assertEquals(4, Math::subtract('4', null));
        $this->assertEquals(4, Math::subtract('4', 'a'));
        $this->assertEquals(4, Math::subtract('4', '*'));
    }

    public function test_can_divide_values()
    {
        $this->assertEquals(1, Math::divide(3, 3));
        $this->assertEquals(1.5, Math::divide('3', '2'));
        $this->assertEquals(2.25, Math::divide('4.5', 2));
    }

    /**
     * @expectedException Edgars\Calculator\DividedByZeroException
     */
    public function test_throws_exception_on_divided_by_zero()
    {
        $result = Math::divide('4', null);
        $this->assertEquals(4, $result);
    }


}