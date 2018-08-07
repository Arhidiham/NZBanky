<?php
namespace Validate\Algorithm;

/**
 * D algorithm validator.
 *
 * @category Validate
 * @package  Algorithm
 *
 * @author   Quintin Venter
 * @since    26 July 2018
 */
class Delta extends AbstractAlgorithm implements AlgorithmInterface
{
    
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
            'account' => [0, 7, 6, 5, 4, 3, 2, 1],
            'suffix' => [0, 0, 0, 0],
            'modulo' => 11,
        ];
    }
    
}