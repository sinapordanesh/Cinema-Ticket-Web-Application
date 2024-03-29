<?php
require_once ("Controller.php");

class MovieSearchController extends Controller
{
    /**
     * @var array
     */
    private $moviesList = array();

    /**
     * @param $name
     * @return void
     */
    public function searchMovieByName($name = ""){
        if ($name == ""){
            $result = self::find_this_query("SELECT * FROM movies");
        } else{
            $result =  self::find_this_query("SELECT * FROM movies WHERE name LIKE '%$name%'");
        }

        foreach ($result as $item){
            $this->moviesList [] = new Movie($item["name"], $item["price"], $item["releaseDate"], $item['available']);
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