<?php

namespace Validate;

use Validate\Vo\AccountVo;

/**
 * Bank account validator class.
 * 
 * @category Validate
 * @package  Validate
 * 
 * @author   Quintin Venter
 * @since    26 July 2018
 */
class Validate
{
    
    /**
     * Checks if the provided account number is valid.
     * 
     * @param string $number - the account number in question
     * 
     * @return bool - true if the number is valid
     */
    public function run(string $number) : bool
    {
        $valid = false;
        try {
            $account = $this->split($number);
            $algorithm = $this->getAlgorithm($account);
            // make sure the factory returned a usable class
            if (!is_null($algorithm)) {
                $valid = $algorithm->validate($account);
            }
        } catch (\Exception $e) {
            // suppress the error and simply mark the number as invalid
        }
        return $valid;
    }
    
    /**
     * Retrieves the correct validation algorithm for the selected number.
     * 
     * @param AccountVo $account - the account value object
     * 
     * @return Algorithm\AlgorithmInterface - the algorithm used to validate the number
     */
    protected function getAlgorithm(AccountVo $account) : Algorithm\AlgorithmInterface
    {
        $class = new Algorithm\Fail(); // if we find nothing then we auto fail
        $map = $this->getAlgorithmMap();
        // ensure that the bank Id exists in the map
        if (isset($map[$account->getBank()])) {
            $bank = $map[$account->getBank()];
            // loop the branches
            foreach ($bank['branches'] as $branch) {
                // check if hte current branch code is within the subset
                if (($account->getBranch() >= $branch[0]) && ($account->getBranch() <= $branch[1])) {
                    $class = $this->getAlgorithmFactory($bank['algorithm'], $account->getAccount());
                    break; // found our class so no need to look further
                }
            }
        }
        
        return $class;
    }
    
    /**
     * Sets up and returns the algorithm class required
     * 
     * @param string $algorithm - the algorithm class name
     * @param string $account - the account number
     * 
     * @return Algorithm\AlgorithmInterface
     */
    protected function getAlgorithmFactory(string $algorithm, string $account) : Algorithm\AlgorithmInterface
    {
        $className = $algorithm;
        if ($algorithm == 'AB') {
            $className = $this->getAlfaBravo($account);
        }
        return new $className();
    }
    
    /**
     * Checks if the A or B type algorithm should be used.
     * 
     * @param string $account - the account number
     * 
     * @return string
     */
    protected function getAlfaBravo(string $account) : string
    {
        if ($account < 990000) {
            return Algorithm\Alfa::class;
        } else {
            return Algorithm\Bravo::class;
        }
    }
    
    /**
     * Splits the number into sections.
     * Checks that each field is of the correct length.
     * Sets the class variables.
     * 
     * @param string $number - the number to split up
     * 
     * @throws \Exception - if any validation fails 
     * 
     * @return AccountVo - the account setup
     */
    protected function split(string $number) : AccountVo
    {
        $account = explode('-', $number);
        if (count($account) != 4) {
            throw new \Exception('Invalid account number.');
        }
        $vo = new AccountVo();
        if ($vo->validateBank($account[0])) {
            $vo->setBank($account[0]);
        } else {
            throw new \Exception('Invalid bank Id.');
        }
        if ($vo->validateBranch($account[1])) {
            $vo->setBranch($account[1]);
        } else {
            throw new \Exception('Invalid branch code.');
        }
        if ($vo->validateAccount($account[2])) {
            $vo->setAccount($account[2]);
        } else {
            throw new \Exception('Invalid account number.');
        }
        if ($vo->validateSuffix($account[3])) {
            $vo->setSuffix($account[3]);
        } else {
            throw new \Exception('Invalid account suffix.');
        }
        return $vo;
    }
    
    /**
     * The algorithm map.
     * 
     * @return array
     */
    protected function getAlgorithmMap() : array
    {
        return [
            '01' => ['algorithm' => 'AB', 'branches' => [[1, 999], [1100, 1199], [1800, 1899]]],
            '02' => ['algorithm' => 'AB', 'branches' => [[1, 999], [1200, 1299]]],
            '03' => ['algorithm' => 'AB', 'branches' => [[1, 999], [1300, 1399], [1500, 1599], [1700, 1799], [1900, 1999]]],
            '06' => ['algorithm' => 'AB', 'branches' => [[1, 999], [1400, 1499]]],
            '08' => ['algorithm' => Algorithm\Delta::class, 'branches' => [[6500, 6599]]],
            '09' => ['algorithm' => Algorithm\Eko::class, 'branches' => [[0, 0]]],
            '11' => ['algorithm' => 'AB', 'branches' => [[5000, 6499], [6600,8999]]],
            '12' => ['algorithm' => 'AB', 'branches' => [[3000, 3299], [3400, 3499], [3600, 3699]]],
            '13' => ['algorithm' => 'AB', 'branches' => [[4900, 4999]]],
            '14' => ['algorithm' => 'AB', 'branches' => [[4700, 4799]]],
            '15' => ['algorithm' => 'AB', 'branches' => [[3900, 3999]]],
            '16' => ['algorithm' => 'AB', 'branches' => [[4400, 4499]]],
            '17'=> ['algorithm' => 'AB', 'branches' => [[3300, 3399]]],
            '18'=> ['algorithm' => 'AB', 'branches' => [[3500, 3599]]],
            '19'=> ['algorithm' => 'AB', 'branches' => [[4600, 4649]]],
            '20'=> ['algorithm' => 'AB', 'branches' => [[4100, 4199]]],
            '21' => ['algorithm' => 'AB', 'branches' => [[4800, 4899]]],
            '22' => ['algorithm' => 'AB', 'branches' => [[4000, 4049]]],
            '23' => ['algorithm' => 'AB', 'branches' => [[3700, 3799]]],
            '24' => ['algorithm' => 'AB', 'branches' => [[4300, 4349]]],
            '25' => ['algorithm' => Algorithm\Foxtrot::class, 'branches' => [[2500, 2599]]],
            '26' => ['algorithm' => Algorithm\Golf::class, 'branches' => [[2600, 2699]]],
            '27' => ['algorithm' => 'AB', 'branches' => [[3800, 3849]]],
            '28' => ['algorithm' => Algorithm\Golf::class, 'branches' => [[2100, 2149]]],
            '29' => ['algorithm' => Algorithm\Golf::class, 'branches' => [[2150, 2299]]],
            '30' => ['algorithm' => 'AB', 'branches' => [[2900, 2949]]],
            '31' => ['algorithm' => Algorithm\Xray::class, 'branches' => [[2800, 2849]]],
            '33' => ['algorithm' => Algorithm\Foxtrot::class, 'branches' => [[6700, 6799]]],
            '35' => ['algorithm' => 'AB', 'branches' => [[2400, 2499]]],
            '38' => ['algorithm' => 'AB', 'branches' => [[9000, 9499]]],
        ];
    }
    
}