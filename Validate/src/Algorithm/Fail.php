<?php
namespace Validate\Algorithm;

use Validate\Vo\AccountVo;

/**
 * Automatic failure.
 *
 * @category Validate
 * @package  Algorithm
 *
 * @author   Quintin Venter
 * @since    26 July 2018
 */
class Fail extends AbstractAlgorithm implements AlgorithmInterface
{
    
    /**
     * Automatically fails the validation.
     *
     * {@inheritDoc}
     * @see \Validate\Algorithm\AlgorithmInterface::validate()
     * 
     * @param AccountVo $account - the account number value object
     * 
     * @return bool - if the validation passed
     */
    public function validate(AccountVo $account) : bool
    {
        return false;
    }
    
}