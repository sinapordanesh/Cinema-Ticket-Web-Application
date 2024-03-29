<?php

require_once('config.php');


class Database
{
    /**
     * @var
     */
    public $connection;

    /**
     *
     */
    function __construct()
    {
        $this->open_db_connection();
    }

    /**
     * @return void
     */
    public function open_db_connection()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if($this->connection->connect_error)
        {
            die('Database connection failed badly' . mysqli_error());
        }
    }

    /**
     * @param $sql
     * @return bool|mysqli_result
     */
    public function query($sql)
    {
        $result = mysqli_query($this->connection, $sql);

        return $result;
    }

    /**
     * @param $result
     * @return void
     */
    private function confirm_query($result)
    {
        if(!$result)
        {
            die("Query failed");
        }
    }

    /**
     * @param $string
     * @return string
     */
    public function escape_string($string)
    {
        $escaped_string = mysqli_real_escape_string($this->connection, $string);
        return $escaped_string;
    }

}

$database = new Database();
