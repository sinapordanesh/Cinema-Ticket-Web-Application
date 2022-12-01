<?php

require_once ("Controller.php");

class AuthenticationController extends Controller
{

    public static function verifyUser($email, $password)
    {
        global $database;

        $email = $database->escape_string($email);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE ";
        $sql .= "email = '{$email}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_this_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function userObject($userQuery){

        if(!empty($userQuery)){
            $item = $userQuery;
            if ($item["role"] == "registered"){
                $user = new RegisteredUser($item["id"], $item["email"], $item["name"], $item["role"],$item["address"], $item["feePayment"], $item["expiryDate"], $item["creditCardNumber"]);
            } else{

            }

            global $singleton;
            $singleton->setUserObject($user);
            return true;
        } else{
            return false;
        }
    }

}