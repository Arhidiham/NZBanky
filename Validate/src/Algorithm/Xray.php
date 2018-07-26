<?php
namespace Validate\Algorithm;

use Validate\Vo\AccountVo;

/**
 * X algorithm validator.
 *
 * @category Validate
 * @package  Algorithm
 *
 * @author   Quintin Venter
 * @since    26 July 2018
 */
class Xray extends AbstractAlgorithm implements AlgorithmInterface
{
    
    /**
     * Does the validation logic for this class.
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
        return true;
    }
    
}