<?php
require_once ("Controller.php");

class MovieSearchController extends Controller
{
    private $moviesList = array();

    public function searchMovieByName($name = ""){
        if ($name == ""){
            $result = self::find_this_query("SELECT * FROM movies");
        } else{
            $result =  self::find_this_query("SELECT * FROM movies WHERE name LIKE '%$name%'");
        }

        foreach ($result as $item){
            $this->moviesList [] = new Movie($item["name"], $item["price"], $item["releaseDate"]);
        }
    }

    /**
     * @return array
     */
    public function getMoviesList()
    {
        return $this->moviesList;
    }

    /**
     * @param array $moviesList
     */
    public function setMoviesList($moviesList)
    {
        $this->moviesList = $moviesList;
    }
}