<?php
require_once ("User.php");

class RegisteredUser extends User
{
    private $address;
    private $feePayment;
    private $expiryDate;
    private $creditCardNumber;

    public function __construct($userId, $email, $password, $name, $role, $address, $feePayment, $expiryDate, $creditCardNumber)
    {
        parent::__construct($userId, $email, $password, $name, $role);
        $this->address = $address;
        $this->feePayment = $feePayment;
        $this->expiryDate = $expiryDate;
        $this->creditCardNumber = $creditCardNumber;
    }

    public function dbGet()
    {
        // TODO: Implement dbGet() method.
    }

    public function dbCreate()
    {
        $sql = "INSERT INTO ";
        $sql .= "users (email, password, name, address, creditCardNumber)";
        $sql .= " VALUES ('$this->email', '$this->password', '$this->name', '$this->address', $this->creditCardNumber)";
        return self::create($sql);
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getFeePayment()
    {
        return $this->feePayment;
    }

    /**
     * @param mixed $feePayment
     */
    public function setFeePayment($feePayment)
    {
        $this->feePayment = $feePayment;
    }

    /**
     * @param mixed $expiryDate
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * @return mixed
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * @return mixed
     */
    public function getCreditCardNumber()
    {
        return $this->creditCardNumber;
    }

    /**
     * @param mixed $creditCardNumber
     */
    public function setCreditCardNumber($creditCardNumber)
    {
        $this->creditCardNumber = $creditCardNumber;
    }


}