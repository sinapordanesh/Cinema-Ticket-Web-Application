<?php

/**
 *
 */
class Db_object {

    /**
     * @return array
     */
    public static function find_all() {

        return static::find_by_query("SELECT * FROM ". static::$db_table. " ");

    }

    /**
     * @param $id
     * @return false|mixed|null
     */
    public static function find_by_id($id) {
        $the_result_array = static::find_by_query("SELECT * FROM ". static::$db_table." WHERE id={$id} LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;


    }

    /**
     * @param $sql
     * @return array
     */
    public static function find_by_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)) {

            $the_object_array[] = static::instantation($row);

        }

        return $the_object_array;

    }

    /**
     * @param $the_record
     * @return mixed
     */
    public static function instantation($the_record){

        $calling_class = get_called_class();
        $the_object = new $calling_class;

        foreach($the_record as $the_attribute => $value) {
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }

        }
        return $the_object;
    }

    /**
     * @return array
     */
    protected function properties() {

        //return get_object_vars();
        $properties = array();
        foreach(static::$db_table_fields as $db_field) {

            if(property_exists($this, $db_field)){

                $properties[$db_field] = $this->$db_field;
            }

        }

        return $properties;

    }

    /**
     * @return array
     */
    protected function clean_properties() {
        global $database;
        $clean_properties = array();
        foreach($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }
        return $clean_properties;
    }

    /**
     * @return bool
     */
    public function create() {
        global $database;

        $properties = $this->clean_properties();

        $sql = "INSERT INTO " .static::$db_table.
            "(".implode(",", array_keys($properties)).")";
        $sql .= "VALUES ('".  implode("','", array_values($properties))        ."')";


        if($database->query($sql)) {
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }



    }

    /**
     * @return bool
     */
    public function update() {
        global $database;


        $properties = $this->clean_properties();
        $properties_pairs = array();

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }


        $sql = "UPDATE ".static::$db_table." SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id = " .$database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }
}

