<?php



require_once('init.php');
require_once('authenticate.php');

    $firstname = $_POST['uname'];
    $pass = $_POST['psw'];

    if(!usr_log_in($firstname,$pass)){

        echo "<script>alert('password not correct')</script>";

    }


   
    ?>

