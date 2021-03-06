<?php
session_start();
require_once('init.php');

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

    <!-- <link rel="stylesheet" href="loginstyle.css"> -->

    <link rel="stylesheet" href="date-picker.css">

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />


    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <script src="https://use.fontawesome.com/a31a0bdd36.js"></script>

    <title>COURSEWORK</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="normalize.css"> -->
    <link rel="stylesheet" href="radio.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="section-sidebar.css">
    <link rel= "stylesheet" href="post-Event.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src= "search.js"></script>


</head>

<body>

    <nav>

        <div class="logo">
            <a href="landing.php" class="logolink"> <img src="images/logo.png"> </a>

        </div>

        <div class="search-bar">
            <form method="post" action="search.php" class="search">
                
                <input type="text" placeholder="Search.." name="searchbar" onkeydown="search(this)">
            </form>
        </div>



        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>



        </div>



    </nav>







    <!-- ------------------------------------------------ -->


    <!-- <div id="signout" class="signuoutclass">

<form class="modal-content animate" action="action.php" method="post">
    <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close"
              title="Close Modal">&times;</span>
              <a href= "account.php">
        <img src="images/avatar.png" alt="Avatar" class="avatar">
        </a>

        <button>Signout</button>


    </div>

    <div class="container">
        <label for="uname"><b>Username</b>
        </label>
        <button type="button" id="signupButton" title="Close Modal"> Signup</button>



    </div>
</form>
</div> -->






    <!--
                                            HERE the MODAL(login/signup) ends
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
-->


    <div class="indexcontainer">

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


                    <a href="bookmark.php">
                        <li>
                            <i class="fas fa-bookmark"></i>
                            <p>Bookmarks</p>

                        </li>
                    </a>

                    <a href="Map.php">

                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Map</p>
                        
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

        <div class="indexfeed">




<!-- <div id="map"></div> -->

<br>
           
   
            <div class="eventfeed " id="id02">
                <section class="postsection1">
                <span onclick="document.getElementById('id02').style.display='none'" class="close1" title="Close Modal">&times;</span>
                    <form action="post-Event.php" method="POST" class="event-content animate" autocomplete="off">
                   

                        <div class="text">
                       
                            <header style="font-size:large;">Post a new event</header>
                            <input placeholder="Title" id="title" name="title" required></input>
                            
                        </div>
                            <div class="date-picker"> </div>

                            <label for="time" name="time">Start Time</label>
                            <input type="time" name="time" id="time" />
                            <!-- <input class="bridgePHP" value='MEMLI'></input> -->

                            <div id="eventoption">

                       <input type="text" id="date1" name="date" value="" style="width:50%;">
                                <h4>Select a Facility</h4>

                                <div class="col-xl-10 pb-5">
                                    <input class="checkbox-budget" type="radio" name="budget" id="budget-1" value="Library" checked>
                                    <label class="for-checkbox-budget" for="budget-1">
                                        <span data-hover="Library">Library</span>
                                    </label>
                                    <!--
						--><input class="checkbox-budget" type="radio" name="budget" id="budget-2" value="Warehouse">
                                    <label class="for-checkbox-budget" for="budget-2">
                                        <span data-hover="Warehouse">Warehouse</span>
                                    </label>
                                    <!--
						--><input class="checkbox-budget" type="radio" name="budget" id="budget-3" value="YMCA">
                                    <label class="for-checkbox-budget" for="budget-3">
                                        <span data-hover="YMCA">YMCA</span>
                                    </label>
                                    <!--
						-->
                                </div>


                                <input type="submit" value="post" />


                            </div>

                            

                    </form>


                    </section>
                    </div>


        <!-- --------------------------TEST FOR EVENT POPUPP------------------------------------ -->


        <h1 >Search Results</h1>

        <?php
                    require_once('query_auth.php');
                   

                    if(!empty( $event = search($_POST['searchbar']))){



                    for ($x = 0; $x <sizeof($event) ;$x++) {  
                       $date1 =  $event[$x]-> get_date();

                         
                            echo  
                            '  
                            <div class="eventtest'.$x.'" id="">
                             <section class="postsection">
                          
                             <h1 style="color:#0077CC;">'
                             .$event[$x]->get_title().
                             '
                             </h1>
                             
                             <p>'.$date = $event[$x]->get_date().'</p>
     
                             
                             
     
                             <div>Time: '.$event[$x]->get_time().'
                             <br>
                                 TODO: FIX THIS LATER Location: '.$event[$x]->get_lat().'
                             </div> 
    
                             
                             </div>
                             
                             
                             ';
                        

                   

                    
                }
            }

            else{
                echo '<i id="error-fa1">! No Results</i>
               <i class="fas fa-sad-tear" id="error-fa"></i>';
            }

                    

                    
                    
                    ?> 

        <!-- -----------------------------EEEEENNNNDDDDDDDD--------------------------------------- -->


        <!-- -----------------------------EEEEENNNNDDDDDDDD--------------------------------------- -->






<!-- ----------------------------end of INDEXFEED------------------------------------------------------------------------->

                    </div>




        </div>







    <!--

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
-->




    <script>
        //dipslays the login(modal)
        const signup = document.getElementById('signupButton');

        signup.addEventListener('click', () => {
            var s = document.getElementById('signup');
            var modal = document.getElementById('id01');
            modal.style.display = "none";
            s.style.display = 'block';

        });
    </script>



    <script src="index.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
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
    </script>



    <script>
        //other api map
        const mymap = L.map('mapid').setView([51.505, -0.09], 13);
        const attribution =
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';
        const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        const tiles = L.tileLayer(tileUrl, {
            attribution
        });
        tiles.addTo(mymap);
        const marker = L.marker([51.505, -0.09], 13).addTo(mymap);
    </script>


        <!-- TODO: Delete this
    <script>
        function initMap() {
            var location = {
                lat: 40.6401,
                lng: 22.9444
            };
            var library = {
                lat: 40.637350,
                lng: 22.936904
            };

            var YMCA = {
                lat: 40.626573,
                lng: 22.951844
            };

            var warehouse = {
                lat: 40.634825,
                lng: 22.934286
            };
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: location
            });


            var librarymarker = new google.maps.Marker({
                position: library,
                map: map,
                title: 'library'
            });


            var warehousemarker = new google.maps.Marker({
                position: warehouse,
                map: map,
                title: 'Warehouse'
            });


            var ymcamarker = new google.maps.Marker({
                position: YMCA,
                map: map,
                title: 'YMCA'
            });




        }
    </script>-->

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB07Drl0GKvcqjGeHy6W_U0XXsMzR7tMEs&callback=initMap" type="text/javascript"></script>


    <script>
        function thisfn() {
            var eventpost = document.querySelector('.postsection');
            var eventoption = document.getElementById('eventoption');
            const date_picker_element = document.querySelector('.date-picker');
            const date_selected = document.querySelector('.selected-date');

            // alert(event_content);
            date_picker_element.style.display = "block";
            eventoption.style.display = 'block';
            event_content.style.display = "block";
            eventpost.classList.toggle('eventpost-active');
            eventoption.classList.toggle('eventoption-active');
        }
    </script>


    <script src="date-js.js"></script>

    <script>
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
    </script>

    <script>
        function popEvent(){

        

            var eventbutton = document.getElementById('eventbutton');
             var modal2 = document.getElementById('id02');

           
                // modal2.classList.toggle('eventfeed-active');

               modal2.style.display ="block";


            window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
                
            }
        }
        }

    </script>


    <script>
        // function bridge(){
        // var date_selected = document.querySelector('.selected-date');
        // var  bridgePHP = document.querySelector('.bridgePHP');
        // var abc = $(date_selected).data('value');
        // var a = bridgePHP.value;

        // bridgePHP.value = abc;

        // alert(abc);
        // }
    </script>


    <script src="datedropper.pro.min.js">


    </script>



    <script>
        n = new Date();
        y = n.getFullYear();
        m = n.getMonth() + 1;
        d = n.getDate();
        var l = document.getElementById("date1");

        l.value = m + "/" + d + "/" + y;


        $("#date1").dateDropper({});
    </script>





<script type="text/javascript">
function do_login()
{

 var username=$("#username").val();
 var pass=$("#password").val();
 

  $.ajax
  ({
  type:'post',
  url:'AJAX.php',
  data:{
    do_login:"do_login",
   username:username,
   password:pass
  },
  success:function(response) {

  if(response == 1)
  {
    loggedin();

  }
  else if(response == 2 )
  {
    shaker();
  }

  }
  });
 return false;
}

function shaker(){
    var usrbox = document.querySelector('.uname');
    var password = document.querySelector('.password');

   usrbox.classList.toggle('shaker-active');
   password.classList.toggle('shaker-active');

   
    var x = document.getElementsByTagName("h5")[0];
    x.outerHTML = "<h6 style='color:#f44336;'>Wrong password or username</h6>"



}

function loggedin(){
    var loader_wrapper = document.querySelector('.loader-wrapper');
    var loader_inner = document.querySelector('.loader-inner');
    var loader = document.querySelector('.loader');
    // loader.classList.toggle('loader-active');
    var modal = document.querySelector('.id01');
    loader_wrapper.style.display = "block";

    loader.classList.toggle('loader-active');
    loader_inner.classList.toggle('loader-inner-active');

    setTimeout(function(){   swal({
                        title: "Logged in",
                        type: "success",
                        showConfirmButton:false,
                        confirmButtonColor: "green"
                    }); 
                     }, 1000);
    
   
    setTimeout(function(){  window.location.replace("index.php"); }, 2000);
   
    ///setTimeout(() => {    }, 1200);

    

}
</script>






<script>
document.querySelector("#time").addEventListener("input", function(e) {
  const reTime = /^([0-1][0-9]|2[0-3]):[0-5][0-9]$/;
  const time = this.value;
  if (reTime.exec(time)) {
    const minute = Number(time.substring(3,5));
    const hour = Number(time.substring(0,2)) % 12 + (minute / 60);
    this.style.backgroundImage = `url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='40' height='40'><circle cx='20' cy='20' r='18.5' fill='none' stroke='%23222' stroke-width='3' /><path d='M20,4 20,8 M4,20 8,20 M36,20 32,20 M20,36 20,32' stroke='%23bbb' stroke-width='1' /><circle cx='20' cy='20' r='2' fill='%23222' stroke='%23222' stroke-width='2' /></svg>"), url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='40' height='40'><path d='M18.5,24.5 19.5,4 20.5,4 21.5,24.5 Z' fill='%23222' style='transform:rotate(${360 * minute / 60}deg); transform-origin: 50% 50%;' /></svg>"), url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='40' height='40'><path d='M18.5,24.5 19.5,8.5 20.5,8.5 21.5,24.5 Z' style='transform:rotate(${360 * hour / 12}deg); transform-origin: 50% 50%;' /></svg>")`;
  }
});
</script>

<script>const input = document.getElementById("search-input");
const searchBtn = document.getElementById("search-btn");

const expand = () => {
  searchBtn.classList.toggle("close");
  input.classList.toggle("square");
};

searchBtn.addEventListener("click", expand);</script>


<script>


function search(keyword){
    if(event.key === 'Enter') {
        submitFunction();
    }
}

</script>
    


</body>


</html>