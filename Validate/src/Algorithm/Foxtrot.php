<?php
namespace Validate\Algorithm;

/**
 * F algorithm validator.
 *
 * @category Validate
 * @package  Algorithm
 *
 * @author   Quintin Venter
 * @since    26 July 2018
 */
class Foxtrot extends AbstractAlgorithm implements AlgorithmInterface
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
            'account' => [0, 1, 7, 3, 1, 7, 3, 1],
            'suffix' => [0, 0, 0, 0],
            'modulo' => 10,
        ];
    }
    
}