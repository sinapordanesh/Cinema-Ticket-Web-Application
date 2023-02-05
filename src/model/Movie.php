<?php

require_once ("ModelsDatabase.php");

/**
 *
 */
class Movie extends ModelsDatabase
{
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $price;
    /**
     * @var
     */
    private $releaseDate;
    /**
     * @var
     */
    private $available;
    /**
     * @var array
     */
    private $theaters = array();

    /**
     * @param $title
     * @param $price
     * @param $releaseDate
     * @param $available
     */
    public function __construct($title, $price, $releaseDate, $available)
    {
        $this->name = $title;
        $this->price = $price;
        $this->releaseDate = $releaseDate;
        $this->available = $available;
    }

    /**
     * @return void
     */
    public function dbGet()
    {
        // TODO: Implement dbGet() method.
    }

    /**
     * @return void
     */
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