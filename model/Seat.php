<?php

class Seat implements DatabaseRelationships
{
    private $seatId;
    private $theater;
    private $showTime;
    private $available;

    public function __construct($seatId, $theater, $showTime, $available)
    {
        $this->seatId = $seatId;
        $this->theater = $theater;
        $this->showTime = $showTime;
        $this->available = $available;
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
    public function getSeatId()
    {
        return $this->seatId;
    }

    /**
     * @param mixed $seatId
     */
    public function setSeatId($seatId)
    {
        $this->seatId = $seatId;
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
     * @param mixed $showTime
     */
    public function setShowTime($showTime)
    {
        $this->showTime = $showTime;
    }

    /**
     * @return mixed
     */
    public function getShowTime()
    {
        return $this->showTime;
    }

    /**
     * @return mixed
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * @param mixed $available
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    }

}