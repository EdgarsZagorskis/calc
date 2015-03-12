<?php

namespace Edgars\Calculator;

/**
 * Interface MathInterface
 * @package Edgars\Calculator
 */
interface MathInterface
{

    /**
     * @param $val1
     * @param $val2
     * @return mixed
     */
    public static function add($val1, $val2);

    /**
     * @param $val1
     * @param $val2
     * @return mixed
     */
    public static function subtract($val1, $val2);

    /**
     * @param $val1
     * @param $val2
     * @return mixed
     */
    public static function multiply($val1, $val2);

    /**
     * @param $val1
     * @param $val2
     * @return mixed
     */
    public static function divide($val1, $val2);

}