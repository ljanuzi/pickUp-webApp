<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--        <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />-->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="loginstyle.css">
        
        
        <title>COURSEWORK</title>
        
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <!-- <link rel="stylesheet" href="normalize.css"> -->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="accountstyle.css">

        
        
        

    </head>
    <body>
        
        <nav>
             
            <div class ="logo">
              PICK-UP
                          
            </div>
            
            
            
        <ul class = "nav-links">
            <li> <a href = "landing.php"> Home</a></li>
            <li> <a href = "Map.php"> Map</a></li>
            <li> <a href = "about.html"> About</a></li>
            <li> <a href = "#"> Entertaiment</a></li>
        </ul>
            
            <div class="burger">
                <div class= "line1"></div>
                <div class= "line2"></div>
                <div class= "line3"></div>
            
            </div>

            

        </nav>
        
        
        
<!--            <img src="AR_Ausbau1024a.jpg" class="AR">-->

<div class='accontainer'>

<br>


    <?php 
    
  require_once('authenticate.php');
 $u = get_username();
 
 echo (isset($_SESSION['username']) ?  "<img class='circular--square' src='images/$u.jpg'style=' position: relative;
  width: 100px;
  height:100px;
  overflow: hidden;
  border-radius: 50%; margin-top:3%;'>" :  "<img class='circular--square' src='images/avatar.png' style='margin-top:2%;'>");
      ?>
    
    <br>
    
      <h1><?php echo (isset($_SESSION['username']) ?"<p style='color:;'>Your Activity</p>" : ""); ?></h1>  
     <br>
      <div class="accnav">
          
        <button class="manage"><stong>Manage</stong></button>
        <?php 
        
       echo (isset($_SESSION['username']) ? "<a href = 'personal-info.php'><button class='personal-info'>Personal Info</button></a>" 
       :"<button class = 'personalinfo'>Personal Info</button>");
        ?>
                <?php 
        
        echo (isset($_SESSION['username']) ? "<a href = 'account.php'><button class='account'>Account</button></a>" 
        :"<button class = 'personalinfo'>Account</button>");
         ?>
        <button class = "feed">Feed</button>

    </div>

    

       <!-- --------------------------TEST FOR EVENT POPUPP------------------------------------ -->

       <?php
                    require_once('query_auth.php');
                    $event = get_UserEvents($_SESSION['username']);

                    for ($x = 0; $x < sizeof($event) ;$x++) {  
                    
                   echo  
                       '<div class="classevent'.$x.'" id="">
                        <section class="postsection">
                        <h1 style="#0077CC:">'
                        .$event[$x]->get_title().
                        '
                        </h1>
                        
                        <p>'.$event[$x]->get_date().'</p>
                        

                        <div>Time: '.$event[$x]->get_time().'
                        <br>
                            TODO: FIX THIS - Location: '.$event[$x]->get_lat().'
                        </div> 

                        </div>
                        
                        
                        
                        '; }
                        

                    

                    
                    
                    ?> 

        <!-- -----------------------------EEEEENNNNDDDDDDDD--------------------------------------- -->





</div>

<div id="id01" class="modal">
  
    <form class="modal-content animate" action="action.php" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="images/avatar.png" alt="Avatar" class="avatar">
      </div>
  
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required class="uname">
  
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required class="password">
          
        <button type="submit" class="logsubmit">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>


    

      </div>
  
      
        <!-- <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span> -->
      
    </form>
  </div>
  
       
          
    
        

<!-- <footer>
    <div class="foot">
   
    </div>
    

        
        </footer> -->
       
        
        
<!--
        
        <script>
// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("header").style.fontSize = "30px";
  } else {
      document.getElementById("header").style.fontSize = "15px";
  }
}
</script>
-->


<script src = "index.js" ></script>

    </body>
    
   
</html>
