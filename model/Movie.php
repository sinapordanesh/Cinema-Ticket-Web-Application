<?php

require_once ("ModelsDatabase.php");

class Movie extends ModelsDatabase
{
    private $name;
    private $price;
    private $releaseDate;
    private $available;
    private $theaters = array();

    public function __construct($title, $price, $releaseDate, $available)
    {
        $this->name = $title;
        $this->price = $price;
        $this->releaseDate = $releaseDate;
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
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param mixed $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return mixed
     */
    public function getTheaters()
    {
        return $this->theaters;
    }

    /**
     * @param mixed $theaters
     */
    public function setTheaters($theaters)
    {
        $this->theaters = $theaters;
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