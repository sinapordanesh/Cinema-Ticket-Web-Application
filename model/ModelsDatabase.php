<?php

class ModelsDatabase
{
    public static function find_this_query($sql)
    {
        global $database;

        $result_set = $database->query($sql);
        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set))
        {
            $the_object_array[] = $row;
        }

        return $the_object_array;
    }

    public function create($sql)
    {
        global $database;

        if ($database->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($sql) {

        global $database;

        if ($database->query($sql)) {
            return true;
        } else {
            return false;
        }
    }


}