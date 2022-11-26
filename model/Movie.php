<?php

class Movie
{
    private $title;
    private $releaseDate;
    private $theaters;

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
}