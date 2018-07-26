<?php
namespace Validate\Algorithm;

use Validate\Vo\AccountVo;

/**
 * Bank account validator class.
 * 
 * @category Validate
 * @package  Algorithm
 * 
 * @author   Quintin Venter
 * @since    26 July 2018
 */
interface AlgorithmInterface
{
    
    /**
     * Validates the account number using this algorithm.
     * 
     * @param AccountVo $account - the account number value object
     * 
     * @return bool - if the validation passed
     */
    public function validate(AccountVo $account) : bool;
    
}

