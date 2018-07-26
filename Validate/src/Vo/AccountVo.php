<?php

namespace Validate\Vo;

/**
 * Bank account value object.
 *
 * @category Validate
 * @package  Vo
 *
 * @author   Quintin Venter
 * @since    26 July 2018
 */
class AccountVo
{
    
    /**
     * The bank Id being tested.
     *
     * @var string
     */
    public $bank;
    
    /**
     * The branch code being tested.
     *
     * @var string
     */
    public $branch;
    
    /**
     * The account number being tested.
     *
     * @var string
     */
    public $account;
    
    /**
     * The account suffix being tested.
     *
     * @var string
     */
    public $suffix;
    
    /**
     * @return string
     */
    public function getBank() : string
    {
        return $this->bank;
    }

    /**
     * @return string
     */
    public function getBranch() : string
    {
        return $this->branch;
    }

    /**
     * @return string
     */
    public function getAccount() : string
    {
        return $this->account;
    }

    /**
     * @return string
     */
    public function getSuffix() : string
    {
        return $this->suffix;
    }

    /**
     * @param string $bank
     */
    public function setBank($bank) : void
    {
        $this->bank = str_pad($bank, 2, '0', STR_PAD_LEFT);
    }

    /**
     * @param string $branch
     */
    public function setBranch($branch) : void
    {
        $this->branch = str_pad($branch, 4, '0', STR_PAD_LEFT);
    }

    /**
     * @param string $account
     */
    public function setAccount($account) : void
    {
        $this->account = str_pad($account, 8, '0', STR_PAD_LEFT);
    }

    /**
     * @param string $suffix
     */
    public function setSuffix($suffix) : void
    {
        $this->suffix = str_pad($suffix, 4, '0', STR_PAD_LEFT);
    }
    
    /**
     * Checks the bank Id for validity.
     *
     * @param string $value
     *
     * @return bool
     */
    public function validateBank($value) : bool
    {
        return (($value > 0) && ($value <= 99));
    }
    
    /**
     * Checks the branch code for validity.
     *
     * @param string $value
     *
     * @return bool
     */
    public function validateBranch($value) : bool
    {
        return (($value > 0) && ($value <= 9999));
    }
    
    /**
     * Checks the account number for validity.
     *
     * @param string $value
     *
     * @return bool
     */
    public function validateAccount($value) : bool
    {
        return (($value > 0) && ($value <= 99999999));
    }
    
    /**
     * Checks the account suffix for validity.
     *
     * @param string $value
     *
     * @return bool
     */
    public function validateSuffix($value) : bool
    {
        return (($value >= 0) && ($value <= 9999));
    }

}