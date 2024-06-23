<?php  //BY Islam Harby
session_start();
$errors = [] ;
if(empty($_REQUEST["name"])) $errors["name"] = "name is required"; 
if(empty($_REQUEST["gmail"])) $errors["gmail"] = "gmail is required"; 
//required------------
if(empty($_REQUEST["phone"])) $errors["phone"] = "phone is required";
if(!empty($_REQUEST["phone"]) && strlen($_REQUEST["phone"]) < 11 && strlen($_REQUEST["phone"])) $errors["phone"] = "enter your right phone";
if( empty($_REQUEST["pw"])) $errors["pw"] = "password is required"; 
if( empty($_REQUEST["pc"])) $errors["pc"] = "password confirmation is required"; 
else if( empty($_REQUEST["pw"]) != empty($_REQUEST["pc"]) ){
    $errors["pc"] = "password confirmation must be equal password";
}

$name = htmlspecialchars(trim($_REQUEST["name"]) ) ;
$gmail = filter_var($_REQUEST["gmail"],FILTER_VALIDATE_EMAIL);
$phone = htmlspecialchars(trim($_REQUEST["phone"]) ) ;
$password =htmlspecialchars($_REQUEST["pw"]);
$password_confirmation =htmlspecialchars($_REQUEST["pc"]);
if( !empty($_REQUEST["gmail"]) && !filter_var($_REQUEST["gmail"],FILTER_VALIDATE_EMAIL)) { 
    $errors ["gmail"] = "must be add @ with gmail "; }

if(empty($errors)){
    require_once('classs.php');
    try {
        $result = Subscriber::register($name,$gmail,$phone,md5($password));
        header("location:index.php?msg=sr");
    } catch (\Throwable $th) {
        header("location:register.php?msg=ar");
    }


}else{
    $_SESSION["errname"] = $errors["name"];
    $_SESSION["errgmail"] = $errors["gmail"];
    $_SESSION["errphone"] = $errors["phone"];
    $_SESSION["errpw"] = $errors["pw"];
    $_SESSION["errpc"] = $errors["pc"];
    header("location:register.php");
}