<?php
if(!empty($_REQUEST["gmail"]) && !empty($_REQUEST["password"]) ){
    require_once('classs.php');
    User::login($_REQUEST["gmail"],md5($_REQUEST["password"]));
    // try {
    //     User::login($_REQUEST["gmail"],md5($_REQUEST["password"]));
    // } catch (\Throwable $th) {
    //     header("location:register.php?msg=ar");
    // }

    
}else{
    header("location:index.php?msg=empty_fild");
}