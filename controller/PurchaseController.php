<?php
require_once ("Controller.php");

class PurchaseController extends Controller
{

    private $movie;
    private $theaters = array();

    public function searchMovieByName($name = ""){
        $result = self::find_this_query("SELECT * FROM movies WHERE name LIKE '%$name%'");

        if (!empty($result)){
            $this->movie = new Movie($result[0]["name"], $result[0]["price"], $result[0]["releaseDate"]);
        } else{
            echo "No movie found!";
        }
    }

    public function searchTheaterByMovieName($name = ""){
        $result = self::find_this_query("SELECT * FROM theaters WHERE movie LIKE '%$name%'");

        foreach ($result as $item){
            $this->theaters [] = new Theater($item["name"], $item["movie"], $item["showTime"]);
        }
    }

    public function getAvailableTheaterNames(){
        $theaterNames = array();
        foreach ($this->theaters as $theater){
            $theaterNames [] = $theater->getName();
        }
        $theaterNames = array_unique($theaterNames);
        return $theaterNames;
    }

    public function getTheaterAvailableTime($theaterName){
        $theaterObjects = array();

        foreach ($this->theaters as $theater){
            if ($theater->getName() == $theaterName){
                $theaterObjects [] = $theater;
            }
        }

        return $theaterObjects;
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
     * @param array $theaters
     */
    public function setTheaters($theaters)
    {
        $this->theaters = $theaters;
    }

    /**
     * @return array
     */
    public function getTheaters()
    {
        return $this->theaters;
    }

}