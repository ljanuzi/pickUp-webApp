
<?php 
require_once('init.php'); 

if(isset($_POST['save_changes'])){
if(isset($_POST['email'],$_POST['name'])){
    $email = $_POST['email'];

    $name = $_POST['name'];

    require_once('query_auth.php');
    
  if(insert_changes($email,$name)){
   echo 1;
  }

   else{
      echo 2;
   }
    
   

}


if(isset($_POST['password'])){

    require_once('query_auth.php');
    $newpassword = $_POST['password'];
    $currentpassword = $_POST['currentpassword'];

    $testpassword = get_password($_SESSION['username']);

    if($currentpassword != $testpassword){
        echo 2;
    }

    else{

       if(change_password($newpassword)) {
           echo 1;
       }

    }





}
exit();

}

?>