<?php 


require_once('init.php');
require_once('authenticate.php');
require_once('query_auth.php');

if(isset($_POST['do_login'])){

    $username = $_POST['username'];
    $pass = $_POST['password'];

    if(usr_log_in($username,$pass)){
        echo 1;
    }
    else{
        echo 2;
    }
    exit();
}

if (isset($_POST['action'])) {
    $id = $_POST['id'];
    switch($_POST['action']){
        case "join": 
            unJoinEvent($id);
            exit();
            break;
        case "bookmark":
            unBookmarkEvent($id);
            exit();
            break;
        case "joined!":
            joinEvent($id);
            exit();
            break;
        case "bookmarked!":
            bookmarkEvent($id);
            exit();
            break;
        case "Delete":
            deleteEvent($id);
            exit();
            break;
    }
}

?>