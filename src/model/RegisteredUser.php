<?php
require_once ("User.php");

/**
 *
 */
class RegisteredUser extends User
{
    /**
     * @var
     */
    private $address;
    /**
     * @var
     */
    private $feePayment;
    /**
     * @var
     */
    private $expiryDate;
    /**
     * @var
     */
    private $creditCardNumber;

    /**
     * @param $userId
     * @param $email
     * @param $password
     * @param $name
     * @param $role
     * @param $address
     * @param $feePayment
     * @param $expiryDate
     * @param $creditCardNumber
     */
    public function __construct($userId, $email, $password, $name, $role, $address, $feePayment, $expiryDate, $creditCardNumber)
    {
        parent::__construct($userId, $email, $password, $name, $role);
        $this->address = $address;
        $this->feePayment = $feePayment;
        $this->expiryDate = $expiryDate;
        $this->creditCardNumber = $creditCardNumber;
    }

    /**
     * @return bool|mixed
     */
    public function dbCreate()
    {
        $sql = "INSERT INTO ";
        $sql .= "users (email, password, name, address, creditCardNumber)";
        $sql .= " VALUES ('$this->email', '$this->password', '$this->name', '$this->address', $this->creditCardNumber)";
        return self::create($sql);
    }

    /**
     * @param $updateType
     * @return bool|void
     */
    public function dbUpdate($updateType)
    {
        if ($updateType == "feePayment"){
            $nextYear = time() + 31536000;
            $sql = "UPDATE users";
            $sql .= " SET feePayment = 1, expiryDate = $nextYear";
            $sql .= " WHERE id = $this->userId;";

            if (self::update($sql)){
                $this->feePayment = 1;
                $this->expiryDate = $nextYear;
                return true;
            } else{
                return false;
            }
        }
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