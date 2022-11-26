<?php

class Movie implements DatabaseRelationships
{
    private $title;
    private $releaseDate;
    private $theaters;

    public function __construct($title, $releaseDate, $theaters)
    {
        $this->title = $title;
        $this->releaseDate = $releaseDate;
        $this->theaters = $theaters;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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

    public function dbGetTable(){

    }

    public function dbSetTable(){

    }


}