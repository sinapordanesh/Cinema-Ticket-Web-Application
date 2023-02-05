<?php

class ModelsDatabase
{
    /**
     * @param $sql
     * @return array
     */
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

    /**
     * @param $sql
     * @return bool
     */
    public function create($sql)
    {
        global $database;
        if ($database->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $sql
     * @return bool
     */
    public static function update($sql)
    {
        global $database;
//        die($sql);

        if ($database->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $sql
     * @return bool
     */
    public function delete($sql) {

        global $database;

        if ($database->query($sql)) {
            return true;
        } else {
            return false;
        }
    }


}