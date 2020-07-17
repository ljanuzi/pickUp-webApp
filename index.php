

<?php include('server.php') ?>

<!DOCTYPE html>

<html lang="en">

<head>
    
 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="landing.css">
    

    <?php
//require_once('init.php');

echo (isset($_SESSION['username']) ?  "<script>window.location.replace('landing.php');</script>" : " "); 

?>
    
    
    <title>PickUP</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--        <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />-->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    
    


    
    <!-- <link rel="stylesheet" href="normalize.css"> -->
    
    
    

</head>

<body>
    
    <div class="container">
  
    <div class="split left">
        
      <div class="centered">
          <div class="logo">
            <img src="images/pickup5.png">
            
            <div class="slogan">
                <p>Join an event.</p>
                <p>Connect with friends.</p>
            </div>
        </div>
      </div>
    </div>
    

    
    <div class="split right">
      <div class="centered">
          <span class="signin"><h1>Sign in</h1></span>
        <form class="hi" action="ajax.php" onsubmit="return do_login();">
            

            


                <label for="uname"><b>Username</b>
                </label>
                <input type="text" placeholder="Enter Username" name="uname" required class="uname" id="username">

                <div class="loader-wrapper">
                    <span class="loader"><span class="loader-inner"></span></span>
                </div>

                <label for="psw"><b>Password</b>
                </label>
                <input type="password" placeholder="Enter Password" name="psw" class="password" id="password" required>
                <h5 class="errorlabel"></h5>
                
               
                  <div class="login"> <label for="remember">Remember me</label>
                      <input type="checkbox" name="remember"></div>
                <div class="login">
                    <button type="submit" class="logsubmit1">Login</button></div>
            

        
            

                <br>
                <br> 
             
            <hr>
                
                <br>
                
                <h1>Not a member Yet ?</h1>
            <br>

                 <button type="button" id="signupButton" onclick="document.getElementById('signup').style.display='block'" style="width:auto;"> Create an account</button>



            
        </form>
          
      </div>
    </div>
    </div>
    
        <div id="signup" class="signupclass">
            
            <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close Modal">&times;</span>

        <form class="modal-content animate" action="signup.php" method="post">
            <?php include('errors.php'); ?>
            <div class="imgcontainer">
                <span onclick="document.getElementById('signup').style.display='none'" class="close"
                    title="Close Modal">&times;</span>

            </div>

            <div class="container1">
                <h1>Signup</h1>
                <!-- <h1 style="margin-left: 35%;"> SIGN UP</h1> -->
                <br>
                <label for="fname"><b>First Name</b></label>
                <input type="text" placeholder="Enter first name" name="fname" required class="uname">
                <label for="lname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter last name" name="lname" required class="uname">


                <!--<label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" class="uname"  value="">-->

                <label for="psw1"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" id="psw1" name="password1" required class="password">

                <input type="password" placeholder="Re-enter Password" id="psw2" name="password2" required class="password">
                
                
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Your email" name="email" required class="signupemail"
                     required value="<?php echo $email; ?>">

                <button type="submit" class="logsubmit" id="signupButton1" onclick="return Validate()" name="reg_user">Sign up</button>
                
                <button type="submit" class="cancelsubmit" onclick="document.getElementById('signup').style.display='none'">Cancel</button>
                <br>
                <br>
            </div>
        </form>

    </div>

    
    
    <!--<script>
        var signupclass = document.getElementById('signupclass');
        
        window.onclick = function(event) {
          if (event.target == signupclass) {
            signupclass.style.display = "none";
          }

        }
    </script>-->
    

    <!--<script>
        //dipslays the login(modal)
        const signup = document.getElementById('signupButton');
        signup.addEventListener('click', () => {
            var s = document.getElementById('signup');
            var modal = document.getElementById('id01');
            modal.style.display = "none";
            s.style.display = 'block';
        });
    </script>-->
    
    <script type="text/javascript">
        function do_login() {

            var username = $("#username").val();
            var pass = $("#password").val();
            console.log("inside do_login");

            $.ajax({
                type: 'post',
                url: 'AJAX.php',
                data: {
                    do_login: "do_login",
                    username: username,
                    password: pass
                },
                success: function(response) {

                    if (response == 1) {
                        loggedin();

                    } else if (response == 2) {
                        shaker();
                    }

                }
            });
            return false;
        }

        function shaker() {
            var usrbox = document.querySelector('.uname');
            var password = document.querySelector('.password');

            usrbox.classList.toggle('shaker-active');
            password.classList.toggle('shaker-active');


            var x = document.getElementsByTagName("h5")[0];
            x.outerHTML = "<h6 style='color:#f44336;'>Wrong password or username</h6>"



        }

        function loggedin() {
            var loader_wrapper = document.querySelector('.loader-wrapper');
            var loader_inner = document.querySelector('.loader-inner');
            var loader = document.querySelector('.loader');
            // loader.classList.toggle('loader-active');
            var modal = document.querySelector('.id01');
            loader_wrapper.style.display = "block";

            loader.classList.toggle('loader-active');
            loader_inner.classList.toggle('loader-inner-active');

            // setTimeout(function() {
            //     swal({
            //         titleswal: "Logged in",
            //         type: "success",
            //         showConfirmButton: false,
            //         confirmButtonColor: "green"
            //     });
            // }, 1000);


            //function() {
                window.location.replace("index.php");
            //}

            ///setTimeout(() => {    }, 1200);



        }
    </script>
    
    <!--<script>
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            var email = profile.getEmail();
            var name = profile.getName();
            //   var id = profile.getID();
            //   var profileimage = profile.getImageUrl();
            var username = email.substring(0, email.lastIndexOf("@"));
            var domain = email.substring(email.lastIndexOf("@") + 1);
            if (domain == 'citycollege.sheffield.eu' || domain == "sheffield.ac.uk") {
                $.ajax({
                    type: 'post',
                    url: 'googlelogin.php',
                    data: {
                        email: email,
                        username: username,
                        name: name
                    },
                    success: function(response) {
                        if (response == 1) {
                            loggedin();
                        } else if (response == 2) {
                            swal({
                                title: "Sorry you need to sign in with Sheffield University credentials",
                                type: "error",
                                showConfirmButton: true,
                                showCancelButton: false,
                                customClass: "Custom_Cancel",
                                confirmButtonColor: "#DD6B55"
                            });
                        }
                    }
                });
            } else {
                swal({
                    title: "Sorry you need to sign in with Sheffield University credentials",
                    type: "error",
                    showConfirmButton: true,
                    showCancelButton: false,
                    customClass: "Custom_Cancel",
                    confirmButtonColor: "#DD6B55"
                });
            }
        }
    </script>-->
    
    <!--<script>
        var button = document.getElementById('login-accountbutton');
        var modal = document.getElementById('id01');
        button.addEventListener('click', () => {
            modal.style.display = "block";
        });
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>-->
    
    <!--<script type="text/javascript">
        $(function() {
            //checks if passwords are the same
            $("#signupButton1").click(function() {
                var passalert = document.getElementById('alert');
                var password = $("#psw1").val();
                var confirmPassword = $("#psw2").val();
                if (password != confirmPassword) {
                    swal({
                        title: "Passwords do not match",
                        type: "error",
                        showConfirmButton: true,
                        showCancelButton: false,
                        customClass: "Custom_Cancel",
                        confirmButtonColor: "#DD6B55"
                    });
                    return false;
                }
                swal({
                    title: "Success",
                    type: "success",
                    showConfirmButton: false,
                    customClass: "success",
                    timer: 1500
                });
                return true;
            });
        });
    </script>-->
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <script src="index.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    


</body>
</html>