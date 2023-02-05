<?php
require_once ("ModelsDatabase.php");

abstract class User extends ModelsDatabase
{
    /**
     * @var
     */
    protected $userId;
    /**
     * @var
     */
    protected $email;
    /**
     * @var string
     */
    protected $password = "";
    /**
     * @var
     */
    protected $name;
    /**
     * @var
     */
    protected $role;

    /**
     * @param $userId
     * @param $email
     * @param $password
     * @param $name
     * @param $role
     */
    public function __construct($userId, $email, $password, $name, $role)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->role = $role;
    }

    /**
     * @param $userId
     * @param $email
     * @param $password
     * @return bool
     */
    public static function dbGet($userId, $email = "", $password = ""){
        global $database;
        if (!empty($email) && !empty($password)){
            $email = $database->escape_string($email);
            $password = $database->escape_string($password);

            $sql = "SELECT * FROM users WHERE ";
            $sql .= "email = '{$email}' ";
            $sql .= "AND password = '{$password}' ";
            $sql .= "LIMIT 1";

            $the_result_array = self::find_this_query($sql);
            if (!empty($the_result_array)){
                $query = array_shift($the_result_array);
            } else{
                return false;
            }
        } else{
            $userId = $database->escape_string($userId);

            $sql = "SELECT * FROM users WHERE ";
            $sql .= "id = '{$userId}' ";
            $sql .= "LIMIT 1";

            $the_result_array = self::find_this_query($sql);
            if (!empty($the_result_array)){
                $query = array_shift($the_result_array);
            } else{
                return false;
            }
        }

        if(!empty($query)){

            if ($query["role"] == "registered"){
                $user = new RegisteredUser($query["id"], $query["email"], $query["password"], $query["name"], $query["role"],$query["address"], $query["feePayment"], $query["expiryDate"], $query["creditCardNumber"]);
            } else{

            }
            global $singleton;
            $singleton->setUserObject($user);
            return true;
        } else{
            return false;
        }
    }

    /**
     * @return mixed
     */
    abstract public function dbCreate();

    /**
     * @param $updateType
     * @return mixed
     */
    abstract public function dbUpdate($updateType);


    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

}