<?php
require_once ("ModelsDatabase.php");

class Seat extends ModelsDatabase
{
    /**
     * @var
     */
    private $seatId;
    /**
     * @var
     */
    private $theater;
    /**
     * @var
     */
    private $showTime;
    /**
     * @var
     */
    private $available;

    /**
     * @param $seatId
     * @param $theater
     * @param $showTime
     * @param $available
     */
    public function __construct($seatId, $theater, $showTime, $available)
    {
        $this->seatId = $seatId;
        $this->theater = $theater;
        $this->showTime = $showTime;
        $this->available = $available;
    }

    /**
     * @param $seatId
     * @param $theater
     * @param $showTime
     * @param $status
     * @return bool
     */
    public static function dbUpdateAvailability($seatId, $theater, $showTime, $status)
    {
        $sql = "UPDATE seats";
        $sql .= " SET available = $status";
        $sql .= " WHERE seatId = '$seatId' AND theater = '$theater' AND showTime = $showTime;";

        if (self::update($sql)){
            return true;
        } else{
            return false;
        }
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