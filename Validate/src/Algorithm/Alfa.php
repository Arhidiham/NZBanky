<?php
namespace Validate\Algorithm;

/**
 * A algorithm validator.
 *
 * @category Validate
 * @package  Validate
 *
 * @author   Quintin Venter
 * @since    26 July 2018
 */
class Alfa extends AbstractAlgorithm implements AlgorithmInterface
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
            'branch' => [6, 3, 7, 9],
            'account' => [0, 0, 10, 5, 8, 4, 2, 1],
            'suffix' => [0, 0, 0, 0],
            'modulo' => 11,
        ];
    }
    
}