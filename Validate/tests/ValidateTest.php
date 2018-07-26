<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Constraint\IsType;
use Validate\Validate;

/**
 * Bank account validator test class.
 * 
 * @category Validate
 * @package  Validate
 * 
 * @author   Quintin Venter
 * @since    26 July 2018
 */
class ValidateTest extends TestCase
{
    
    /**
     * Just checking the install with a unit test.
     * 
     * @return void
     */
    public function testNothing() : void
    {
        $model = new Validate();
        $result = $model->returnInt();
        $this->assertInternalType(IsType::TYPE_NUMERIC, $result);
    }
    
}
