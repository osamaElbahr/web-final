<?php
abstract class User
{
    public $id;
    public $name;
    public $gmail;
    public $phone;
    protected $password;

    public static function login($gmail,$password)
    {
        $qry = "SELECT * FROM USERS WHERE gmail='$gmail' AND password='$password' ";
        require_once('config.php');
        $cn= mysqli_connect(DB_HOST,DB_USER_NAME,DB_PASS,DB_NAME);
        $result = mysqli_query($cn,$qry);
        if ($arr = mysqli_fetch_assoc($result)) {
            var_dump($arr);
        }else{
            echo " no user ";
        }
    }
}
class Subscriber extends User
{
    public $role = "subscriber";

    public static function register($name,$gmail,$phone,$password)
    {
        $qry = "INSERT INTO USERS (name,gmail,phone,password) 
        VALUES('$name','$gmail','$phone','$password')";
        require_once('config.php');
        $cn= mysqli_connect(DB_HOST,DB_USER_NAME,DB_PASS,DB_NAME);
        $result = mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $result;
    }
}
class Admin extends User
{
    public $role = "admin";

}