<?php
require_once ("DatabaseRelationships.php");

class Theater implements DatabaseRelationships
{
    private $name;
    private $currentMovie;
    private $showTime;
    private $seats;

    public function __construct($name, $currentMovie, $showTime)
    {
        $this->name = $name;
        $this->currentMovie = $currentMovie;
        $this->showTime = $showTime;
    }


    public function dbGet()
    {
        // TODO: Implement dbGet() method.
    }

    public function dbSet()
    {
        // TODO: Implement dbSet() method.
    }

    public function dbGetSeats(){

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
    public function getSeats()
    {
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