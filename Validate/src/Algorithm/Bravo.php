<?php
namespace Validate\Algorithm;

/**
 * B algorithm validator.
 *
 * @category Validate
 * @package  Algorithm
 *
 * @author   Quintin Venter
 * @since    26 July 2018
 */
class Bravo extends AbstractAlgorithm implements AlgorithmInterface
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
            'account' => [0, 0, 10, 5, 8, 4, 2, 1],
            'suffix' => [0, 0, 0, 0],
            'modulo' => 11,
        ];
    }
    
}