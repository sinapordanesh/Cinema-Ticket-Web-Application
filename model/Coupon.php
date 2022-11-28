<?php

require_once ("ModelsDatabase.php");

class Coupon extends ModelsDatabase
{
    private $couponId;
    private $amount;
    private $expiryDate;

    function __construct($couponId, $amount, $expiryDate){
        $this->couponId = $couponId;
        $this->amount = $amount;
        $this->expiryDate = $expiryDate;
    }

    public function dbGet()
    {
        // TODO: Implement dbGet() method.
    }

    public function dbSet()
    {
        // TODO: Implement dbSet() method.
    }

    /**
     * @return mixed
     */
    public function getCouponId()
    {
        return $this->couponId;
    }

    /**
     * @param mixed $couponId
     */
    public function setCouponId($couponId)
    {
        $this->couponId = $couponId;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * @param mixed $expiryDate
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }
}