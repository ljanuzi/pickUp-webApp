
    <?php
    require_once('database.php');

    $conn = db_connect();

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fullName = $fname . " " . $lname;
    
    
    

    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_POST['email'];
    $usernameArray = explode('@',$email);
    $username = $usernameArray[0];
    
    //TODO: Check if password is the same
    $userpassword = $_POST['password1'];
    

    $pdo = new PDO('mysql:host=localhost;dbname=cwtest1', 'learta', '123');


    $query = "INSERT INTO user (username,name,email,password) 
VALUES(?,?,?,?);";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username,$fullName, $email, $userpassword]);


    require_once('query_auth.php');

    if(verify_user($username,$userpassword)){
        $_SESSION['username'] = $username;
        echo "<script> window.location.replace('landing.php');</script>";

    }

 else {
        echo "<script>alert('Something went wrong);</script>";
    }


    $conn->close();
    ?>