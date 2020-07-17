<?php
session_start();

$fname="";
$lname="";
$username ="";
$email="";
$errors=array();

$servername = "localhost";
$user = "learta";
$pass = "123";
$dbname = "cwtest1";

$conn = mysqli_connect($servername, $user, $pass, $dbname);
	 
if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


if(isset($_POST['reg_user'])) {
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password1 = $_POST['psw1'];
    $password2 = $_POST['psw2'];
    $username = strstr($email, '@', true);

    /*$pdo = new PDO('mysql:host=localhost;dbname=cwtest1', 'lola', '123');*/


    if (empty($fname)) { 
        array_push($errors, "First name required"); 
    }
    if (empty($lname)) { 
        array_push($errors, "Last name required"); 
    }
    if (empty($username)) { 
        array_push($errors, "Username is required"); 
    }
    if (empty($email)) { 
        array_push($errors, "Email is required"); 
    }
    if (empty($password1)) { 
        array_push($errors, "Password is required"); 
    }
      if ($password1 != $password2) {
        array_push($errors, "The two passwords do not match");
    }


    $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";

    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { 
        if ($user['username'] === $username) {
          array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
          array_push($errors, "Email already exists");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password1);

        $query = "INSERT INTO user (username, fname, lname,  email, password) 
                  VALUES('$username', '$fname', '$lname', '$email', '$password')";
        mysqli_query($conn, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: landing.php');
    }

}

?>




