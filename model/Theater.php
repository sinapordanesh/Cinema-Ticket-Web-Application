<?php
require_once ("ModelsDatabase.php");

class Theater extends ModelsDatabase
{
    private $name;
    private $currentMovie;
    private $showTime;
    private $seats = array();

    public function __construct($name, $currentMovie, $showTime)
    {
        $this->name = $name;
        $this->currentMovie = $currentMovie;
        $this->showTime = $showTime;
        $this->dbGetSeats();
    }


    public function dbGet()
    {
        // TODO: Implement dbGet() method.
    }

    public function dbSet()
    {
        // TODO: Implement dbSet() method.
    }

    private function dbGetSeats()
    {
        $result = self::find_this_query("SELECT * FROM seats WHERE theater='$this->name' AND showTime='$this->showTime'");

        foreach ($result as $item){
            $this->seats [] = new Seat($item["seatId"], $item["theater"], $item["showTime"], $item["available"]);
        }

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCurrentMovie()
    {
        return $this->currentMovie;
    }

    /**
     * @param mixed $currentMovie
     */
    public function setCurrentMovie($currentMovie)
    {
        $this->currentMovie = $currentMovie;
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
    public function getSeats($availability)
    {
        $sizeOfSeats = sizeof($this->seats);
        if ($availability == 0){
            for ($i = 0; $i < ($sizeOfSeats * 0.9); $i++){
                unset($this->seats[$i]);
            }
        }

        return $this->seats;
    }

    /**
     * @param mixed $seats
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;
    }


}