<?php

require_once ("ModelsDatabase.php");

/**
 *
 */
class Coupon extends ModelsDatabase
{
    /**
     * @var
     */
    private $uniqueId;
    /**
     * @var
     */
    private $amount;
    /**
     * @var
     */
    private $expiryDate;

    /**
     * @param $uniqueId
     * @param $amount
     * @param $expiryDate
     */
    function __construct($uniqueId, $amount, $expiryDate){
        $this->uniqueId = $uniqueId;
        $this->amount = $amount;
        $this->expiryDate = $expiryDate;
    }


    /**
     * @return bool
     */
    public function dbCreate()
    {
        $sql = "INSERT INTO ";
        $sql .= "coupon (uniqueId, amount, expiryDate)";
        $sql .= " VALUES ($this->uniqueId, $this->amount, '$this->expiryDate')";
//        die($sql);
        return self::create($sql);

    }

    /**
     * @return bool
     */
    public function dbDelete()
    {
        $sql = "DELETE FROM ";
        $sql .= "coupon WHERE uniqueId=$this->uniqueId";
        return self::delete($sql);
    }

    /**
     * @return mixed
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }

    /**
     * @param mixed $uniqueId
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;
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