<?php
namespace Validate\Algorithm;

use Validate\Vo\AccountVo;

/**
 * E algorithm validator. Echo is a php construct so swapped to phonetic eko.
 *
 * @category Validate
 * @package  Algorithm
 *
 * @author   Quintin Venter
 * @since    26 July 2018
 */
class Eko extends AbstractAlgorithm implements AlgorithmInterface
{
    
    /**
     * Applies the sum logic for this class.
     *
     * @param AccountVo $account - the account value object
     * @param array $map - the weight mapping
     *
     * @return int - the total sum
     */
    protected function sum(AccountVo $account, array $map) : int
    {
        return $this->sumDouble($account, $map);
    }
    
    /**
     * The weight mapping for this class
     *
     * @return array
     */
    protected function getMap() : array
    {
        return [
            'bank' => [0, 0],
            'branch' => [0, 0, 0, 0],
            'account' => [0, 0, 0, 0, 5, 4, 3, 2],
            'suffix' => [0, 0, 0, 1],
            'modulo' => 11,
        ];
    }
    
}