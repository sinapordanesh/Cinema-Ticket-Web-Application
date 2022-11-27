<?php
include_once "includes/loader.php";

class Main
{
    static private $movies;
    static private $theaters;

    public function main(){
        echo "salam donya";
    }

    public static function dbFindAllMovies(){
        return self::find_this_query("SELECT * FROM users");
    }


}