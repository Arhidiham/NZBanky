<?php
namespace Validate\Algorithm;

/**
 * C algorithm validator.
 *
 * @category Validate
 * @package  Algorithm
 *
 * @author   Quintin Venter
 * @since    26 July 2018
 */
class Charlie extends AbstractAlgorithm implements AlgorithmInterface
{
    
    /**
     * The weight mapping for this class
     *
     * @return array
     */
    protected function getMap() : array
    {
        return [
            'bank' => [3, 7],
            'branch' => [0, 0, 0, 0],
            'account' => [9, 1, 10, 5, 3, 4, 2, 1],
            'suffix' => [0, 0, 0, 0],
            'modulo' => 11,
        ];
    }
    
}