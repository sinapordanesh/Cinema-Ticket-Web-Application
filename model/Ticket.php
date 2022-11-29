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

    public function dbGet()
    {
        // TODO: Implement dbGet() method.
    }

    public function dbCreate()
    {
        $sql = "INSERT INTO ";
        $sql .= "tickets (uniqueId, userId, movie, theater, showTime, purchaseTime, seatNumber, price, email)";
        $sql .= " VALUES ($this->uniqueId, $this->userId, '$this->movie', '$this->theater', $this->showTime, $this->purchaseTime, '$this->seatNumber', $this->price, '$this->email')";
//        die($sql);
        return self::create($sql);

    }
}