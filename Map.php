
<?php
session_start();
require_once('init.php');


if(!isset($_SESSION['username'])){
    header('Location: login');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--        <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />-->
    <meta name="apple-mobile-web-app-capable" content="yes" />


    <title>PickUp</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="normalize.css"> -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet1" href="style.scss">
    <link rel="stylesheet" href="section-sidebar.css">
    <link rel="stylesheet" href="radio.css">
    
    <script src="https://use.fontawesome.com/a31a0bdd36.js"></script>

    <script src="https://kit.fontawesome.com/d0528b62e3.js" crossorigin="anonymous"></script>



</head>

<body>

    <nav>

        <div class="logo">
            <a href="landing.php" class="logolink"> <img src="images/logo.png"> </a>

        </div>

        



        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>



        </div>



    </nav>


    <!--            <img src="AR_Ausbau1024a.jpg" class="AR">-->

    <div class='index-container'>
        <div class="section-sidebar">
            <br>

            <!-- this button is serves as a login button or account button based on php user session -->
            

           


            <section class="stealthy-scroll-container">




                <ul class="sidebar-nav">

                <a href="profile.php?user=<?php echo $_SESSION['username']?>">
                        
                        <li class="profile">
                            <?php
                        require_once('authenticate.php');
                        $u = get_username();
                        echo (isset($_SESSION['username']) ?  "<img class='circular--square' src='images/$u.jpg'  >" : "");
                        ?>
                            <p class="prof">Profile</p>
                        </li>
                        <br>

                      
                    </a>
                    
                    <a href="landing.php">
                        <li>
                            <i class="fas fa-home" ></i> 
                            <p >Home</p>
                        
                        </li>
                    
                    </a>

                    <a href="#">
                        <li>
                            <i class="fas fa-bell"></i>
                            <p>Notifications</p>

                        </li>
                    </a>

                    <a href="bookmark.php">
                        <li>
                            <i class="fas fa-bookmark"></i>
                            <p>Bookmarks</p>

                        </li>
                    </a>

                    <a href="Map.php">

                        <li>
                            <i class="fas fa-map-marker-alt" style="color: rgb(82, 227, 77);"></i>
                            <p style="color: rgb(82, 227, 77);">Map</p>
                        
                        </li>
                    </a>
                    


                    <a href="settings.php">
                        <li>
                            <i class="fas fa-cog"></i>
                            <p class="settingsfafa">Settings</p>

                        </li>

                    </a>
                    

                    

                </ul>
                <?php
                echo "<a href = 'logout.php'><button class='sslogout'> Logout</button></a>";
                ?>


            </section>


            <!--                    This is the end of the section sidebar-->
            <!------------------- --------------------------------------------------------------------------------------->
        </div>



            
            <div id="map" style="width:1000px; margin-left:33%; " ></div>
        







        <div class="parallax">
            <div class="textparallax">




            </div>




        </div>
    </div>





    <footer>
        <div class="foot">

        </div>



    </footer>
    <script src="index.js"></script>


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

<script src="Map.js"></script>
    <script>
        //populate JS array with the the events from the DB
        eventArray = <?php require_once('query_auth.php');
                    $php_array = array();
                    $php_array = get_AllEvents();
                    echo json_encode($php_array); ?>;
    </script>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB07Drl0GKvcqjGeHy6W_U0XXsMzR7tMEs&callback=initMap" type="text/javascript"
         async defer></script>
    <script src="index.js"></script>

</body>


</html>