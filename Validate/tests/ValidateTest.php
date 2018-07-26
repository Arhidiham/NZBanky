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
     * Returns the list of bank account numbers to verify and if they should
     * pass validation or not.
     * 
     * @return array - the list of bank account numbers to test
     */
    public function providerBankAccounts() : array
    {
        return [
            ['06-0501-0036001-00'],
            ['12-3140-0050265-00'],
            ['12-3148-0075985-51'],
            ['02-0601-0113320-02', false],
            ['03-1598-0017097-25'],
            ['12-3072-0279833-00'],
            ['03-0539-0195008-00'],
            ['06-0501-0036001-32'],
            ['06-0833-0124223-05', false],
            ['12-3272-0207017-03'],
            ['01-0819-0454289-00'],
            ['12-3041-0244961-11'],
            ['03-0854-0594325-25', false],
            ['12-3041-1244961-11'], // to test a B scenario
            ['01-902-0068389-00'], // from the IRD document case A
            ['08-6523-1954512-001'], // from the IRD document case D
            ['26-2600-0320871-032'], // from the IRD document case G
        ];
    }
    
    /**
     * Tests if the validator can accurately distinguish between valid and invalid
     * account numbers.
     * 
     * @param string $number - the number to test
     * @param bool $pass - if the number is expected to pass, defaults to true
     * 
     * @covers Validate::run
     * @dataProvider providerBankAccounts
     * 
     * @return void
     */
    public function testRun(string $number, bool $pass = true) : void
    {
        $model = new Validate();
        $result = $model->run($number);
        $this->assertInternalType(IsType::TYPE_BOOL, $result);
        $this->assertEquals($pass, $result);
    }
    
}
