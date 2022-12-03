<?php
require_once ("ModelsDatabase.php");

class Ticket extends ModelsDatabase
{
    private $uniqueId;
    private $userId = -1;
    private $movie;
    private $theater;
    private $showTime;
    private $purchaseTime;
    private $seatNumber;
    private $price;
    private $email;

    public function __construct($uniqueId, $userId, $movie, $theater, $showTime, $purchaseTime, $seatNumber, $price, $email)
    {
        $this->uniqueId = $uniqueId;
        $this->userId = $userId;
        $this->movie = $movie;
        $this->theater = $theater;
        $this->showTime = $showTime;
        $this->purchaseTime = $purchaseTime;
        $this->seatNumber = $seatNumber;
        $this->price = $price;
        $this->email = $email;
    }

    public function dbCreate()
    {
        $sql = "INSERT INTO ";
        $sql .= "tickets (uniqueId, userId, movie, theater, showTime, purchaseTime, seatNumber, price, email)";
        $sql .= " VALUES ($this->uniqueId, $this->userId, '$this->movie', '$this->theater', $this->showTime, $this->purchaseTime, '$this->seatNumber', $this->price, '$this->email')";
        return self::create($sql) && Seat::dbUpdateAvailability($this->seatNumber, $this->theater, $this->showTime, 0);;
    }

    public function dbDelete()
    {
        $sql = "DELETE FROM ";
        $sql .= "tickets WHERE uniqueId=$this->uniqueId";
        return self::delete($sql) && Seat::dbUpdateAvailability($this->seatNumber, $this->theater, $this->showTime, 1);;
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
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @param mixed $movie
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;
    }

    /**
     * @return mixed
     */
    public function getTheater()
    {
        return $this->theater;
    }

    /**
     * @param mixed $theater
     */
    public function setTheater($theater)
    {
        $this->theater = $theater;
    }

    /**
     * @return mixed
     */
    public function getShowTime()
    {
        return $this->showTime;
    }

    /**
     * @param mixed $showTime
     */
    public function setShowTime($showTime)
    {
        $this->showTime = $showTime;
    }

    /**
     * @return mixed
     */
    public function getPurchaseTime()
    {
        return $this->purchaseTime;
    }

    /**
     * @param mixed $purchaseTime
     */
    public function setPurchaseTime($purchaseTime)
    {
        $this->purchaseTime = $purchaseTime;
    }

    /**
     * @return mixed
     */
    public function getSeatNumber()
    {
        return $this->seatNumber;
    }

    /**
     * @param mixed $seatNumber
     */
    public function setSeatNumber($seatNumber)
    {
        $this->seatNumber = $seatNumber;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}