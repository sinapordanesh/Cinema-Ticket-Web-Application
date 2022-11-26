<?php

class RegisteredUser extends User
{
    private $address;
    private $activationFee;
    private $expiryDate;
    private $creditCardNumber;

    public function __construct($userId, $name, $isAdmin, $address, $activationFee, $expiryDate, $creditCardNumber)
    {
        parent::__construct($userId, $name, $isAdmin);
        $this->address = $address;
        $this->activationFee = $activationFee;
        $this->expiryDate = $expiryDate;
        $this->creditCardNumber = $creditCardNumber;
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
    public function getActivationFee()
    {
        return $this->activationFee;
    }

    /**
     * @param mixed $activationFee
     */
    public function setActivationFee($activationFee)
    {
        $this->activationFee = $activationFee;
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