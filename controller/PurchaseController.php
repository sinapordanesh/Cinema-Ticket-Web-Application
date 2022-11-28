<?php
require_once ("Controller.php");

class PurchaseController extends Controller
{

    private $movie;
    private $theaters = array();

    public function searchMovieByName($name = ""){
        $result = self::find_this_query("SELECT * FROM movies WHERE name IS '$name'");

        $this->movie = new Movie($result["name"], $result["price"], $result["releaseDate"]);
    }

    public function searchTheaterByMovieName($name = ""){
        $result = self::find_this_query("SELECT * FROM theaters WHERE movie IS '$name'");

        foreach ($result as $item){
            $this->theaters [] = new Theater($item["name"], $item["movie"], $item["showTime"]);
        }
    }

    public function seatFeed($){

    }
}