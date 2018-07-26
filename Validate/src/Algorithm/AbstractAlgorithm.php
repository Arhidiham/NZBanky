<?php
namespace Validate\Algorithm;

use Validate\Vo\AccountVo;

/**
 * Abstract algorithm validator.
 *
 * @category Validate
 * @package  Algorithm
 *
 * @author   Quintin Venter
 * @since    26 July 2018
 */
abstract class AbstractAlgorithm
{
    
    /**
     * Does the validation logic for this class.
     * 
     * @param AccountVo $account - the account number value object
     * 
     * @return bool - if the validation passed
     */
    public function validate(AccountVo $account) : bool
    {
        $valid = false;
        $map = $this->getMap();
        $sum = $this->sum($account, $map);
        if (($sum % $map['modulo']) == 0) {
            $valid = true;
        }
        return $valid;
    }
    
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
        $sum = 0;
        $types = [];
        $types['bank'] = str_split($account->getBank());
        $types['branch'] = str_split($account->getBranch());
        $types['account'] = str_split($account->getAccount());
        $types['suffix'] = str_split($account->getSuffix());
        foreach ($types as $type => $split) {
            foreach ($split as $key => $value) {
                $weight = $map[$type][$key];
                $sum += $weight * $value;
            }
        }
        return $sum;
    }
    
    /**
     * Applies the sum logic for this class.
     *
     * @param AccountVo $account - the account value object
     * @param array $map - the weight mapping
     *
     * @return int - the total sum
     */
    protected function sumDouble(AccountVo $account, array $map) : int
    {
        $sum = 0;
        $types = [];
        $types['bank'] = str_split($account->getBank());
        $types['branch'] = str_split($account->getBranch());
        $types['account'] = str_split($account->getAccount());
        $types['suffix'] = str_split($account->getSuffix());
        foreach ($types as $type => $split) {
            foreach ($split as $key => $value) {
                $weight = $map[$type][$key];
                $total = $weight * $value;
                $total = array_sum(str_split($total));
                $sum += array_sum(str_split($total));
            }
        }
        return $sum;
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
            'account' => [0, 0, 0, 0, 0, 0, 0, 0],
            'suffix' => [0, 0, 0, 0],
            'modulo' => 1,
        ];
    }
    
}