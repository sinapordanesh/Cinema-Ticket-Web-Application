<?php

require_once ("Controller.php");

class AuthenticationController extends Controller
{

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public static function verifyUser($email, $password)
    {
        if (User::dbGet(0, $email, $password)){
            global $singleton;
            $user = $singleton->getUserObject();
            $_SESSION["login"] = true;
            $_SESSION["userId"] = $user->getUserId();
            redirect("dashboardPage.php");

            return true;
        } else{
            return false;
        }
    }

    /**
     * @param $email
     * @param $password
     * @param $name
     * @param $address
     * @param $creditCardNumber
     * @return bool
     */
    public static function signUP($email, $password, $name, $address, $creditCardNumber ){
        $user = new RegisteredUser(0, $email, $password, $name, "", $address, 0, 0, $creditCardNumber);
        if ($user->dbCreate()){
            return true;
        } else{
            return false;
        }
    }

    /**
     * @return void
     */
    public static function logOut(){
        unset($_SESSION["login"]);
        unset($_SESSION["subscribed"]);
        unset($_SESSION["userId"]);
        redirect("index.php");
    }

}