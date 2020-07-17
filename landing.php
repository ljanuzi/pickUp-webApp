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
    <meta name="viewport" content="width=device-width, initial-scale=1">


     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />


    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script> 


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" />


  
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>


    <title>PickUp</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
     <!-- <link rel="stylesheet" href="normalize.css"> -->
    <link rel="stylesheet" href="radio.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="section-sidebar.css">
    
    <link rel="stylesheet" href="pagination.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 



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

        <!--<ul class="nav-links">
            <li> <a href="#"> Feed</a></li>
            <li> <a href="Map.php"> Map</a></li>
            
        </ul>-->


        <!-- <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>



        </div> -->



    </nav>



    <!--<div id="id01" class="modal">

        <form class="modal-content animate" action="ajax.php" onsubmit="return do_login();">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="images/avatar.png" alt="Avatar" class="avatar">


            </div>

            <div class="container">

                <div class="g-signin2" data-onsuccess="onSignIn" id="googlebutton"></div>
                <label for="uname"><b>Username</b>
                </label>
                <input type="text" placeholder="Enter Username" name="uname" required class="uname" id="username">

                <div class="loader-wrapper">
                    <span class="loader"><span class="loader-inner"></span></span>
                </div>

                <label for="psw"><b>Password</b>
                </label>
                <input type="password" placeholder="Enter Password" name="psw" class="password" id="password">
                <h5 class="errorlabel"></h5>
                <button type="submit" class="logsubmit">Login</button>

                <input type="checkbox" checked="checked" name="remember"> Remember me

                <br>
                <br> Not a member Yet ?

                <button type="button" id="signupButton" title="Close Modal"> Signup</button>



            </div>
        </form>




    </div>-->


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




    <!-- <div id="signup" class="signupclass">

        <form class="modal-content animate" action="signup.php" method="post">

            <div class="imgcontainer">
                <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close Modal">&times;</span>

            </div>

            <div class="container">
                Signup
   
                <br>


                <input type="text" placeholder="Enter first name" name="fname" required class="uname">
                <input type="text" placeholder="Enter last name" name="lname" required class="uname">


                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required class="uname">

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" id="psw1" name="psw" required class="password">

                <input type="password" placeholder="Re-enter Password" id="psw2" name="psw2" required class="password">
                Email
                <input type="email" placeholder="Your email" name="email" required class="signupemail" style="width:100%; height:50px; padding: 12px 20px;" required>

                <button type="submit" class="logsubmit" id="signupButton1" onclick="return Validate()">Sign up</button>
                <br>
                <br>
            </div>
        </form>

    </div>-->



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
                            <i class="fas fa-home" style="color: rgb(82, 227, 77);"></i>
                            <p style="color: rgb(82, 227, 77);">Home</p>

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


            <!-- <div class="search-bar">
                <i class="fa fa-search"></i>
                <form method="post" action="search.php">
                    <input type="search" placeholder="Search" name="searchbar" onkeydown="search(this)">
                </form>
            </div> -->

            <!-- <div id="map"></div> -->


            <!-- <h1>Event Feed</h1> -->
            <div id="eventbutton" onclick="popEvent()">
                <header style="font-size:large;">Host event</header>
                <!-- <input placeholder="Title" id="title1" name="title" autocomplete="off"></input> -->

            </div>


            <div class="eventfeed " id="id02">
                <!-- used to be postsection1, changed bc the css is causing me problems -->
                <section class="postsection1">

                    <span onclick="document.getElementById('id02').style.display='none'" class="close1"
                        title="Close Modal">&times;</span>
                    <form action="post-Event.php" method="POST" enctype="multipart/form-data"
                        class="event-content animate" autocomplete="off">



                        <div class="text">

                            <header style="font-size:30px;">Host a new event</header> <br>

                        </div>
                        <div class="event-body">
                            <label for="title">Event name: </label>
                            <input type="text" placeholder="Title" id="title" name="title" required>


                            <br>
                            <br>

                            <label for="date">Select a date: </label>
                            <input type="text" id="date1" name="date" value="" style="width:50%;">
                            <br>
                            <br>
                            <label for="time" name="time">Start Time:</label>
                            <input type="time" name="time" id="time">
                            <br>
                            <br>
                            <br>
                            <h4>Select a Facility</h4>

                            <div class="venueOptions">

                                <input class="checkbox-budget" type="radio" name="budget" id="budget-1"
                                    value="Sofou Building" onclick="removeDiv()" checked>
                                <label class="for-checkbox-budget" for="budget-1">
                                    <span data-hover="Sofou Building">Sofou Building</span>
                                </label>

                                <input class="checkbox-budget" type="radio" name="budget" id="budget-2"
                                    value="Warehouse" onclick="removeDiv()">
                                <label class="for-checkbox-budget" for="budget-2">
                                    <span data-hover="Warehouse">Warehouse</span>
                                </label>

                                <input class="checkbox-budget" type="radio" name="budget" id="budget-3" value="YMCA"
                                    onclick="removeDiv()">
                                <label class="for-checkbox-budget" for="budget-3">
                                    <span data-hover="YMCA">YMCA</span>
                                </label>

                                <div id="budget-4id">
                                    <input class="checkbox-budget" type="radio" name="budget" id="budget-4"
                                        value="Sofou Building" onclick="showDiv()">
                                    <label class="for-checkbox-budget" for="budget-4">
                                        <span data-hover="Other">Other</span>
                                    </label>
                                </div>

                              
                                <div id="map" style="display:none"></div>
                                
                                
                                <br>


                            </div> 
                            <br>
                            <br>
                            <label for="eventDescription">Event Description</label>
                            <input type="text" name="eventDescription">

                            <br>
                            <br>
                                <label for="quantity">Max. Users:</label>
                                <input style="width:70px" type="number" id="max_users" name="max_users" min="0" max="100">

                            <br>
                            <br>
                            <label for="picfile">Upload a picture:</label>
                            <input type="file" name="picfile">
                            <input type="submit" value="post" id="postsectionsubmit">
                            <!-- <button type="submit" name="submit">Upload Event Poster</button> -->




                            <!-- <div id="poster" style="display: none">
                            <input type="file" name="picfile">
                            <input type="submit" value="post" id="postsectionsubmit">
                            <!-- <button type="submit" name="submit">Upload Event Poster</button> -->


                        
                        


                        </div>
                    </form>



                </section>
            </div>


            <!--<div class="filterByDay">
                <h4 id="imfree">I am free on:</h4> 
                <hr>
                <form name="dayFilter" method="GET">
                    <input type="checkbox" name="day[]" value="0">Mondays<BR>
                    <input type="checkbox" name="day[]" value="1">Tuesdays<BR>
                    <input type="checkbox" name="day[]" value="2">Wednesdays<BR>
                    <input type="checkbox" name="day[]" value="3">Thursdays<BR>
                    <input type="checkbox" name="day[]" value="4">Fridays<BR>
                    <input type="checkbox" name="day[]" value="5">Saturdays<BR>
                    <input type="checkbox" name="day[]" value="6">Sundays<BR>

                    <input type="submit" value="Filter feed">
                </form>
            </div> <br><br><br>-->

            <!-- <?php
                // require_once('query_auth.php');
                // if(!empty($_GET['day'])){
                //     $daysChosen = $_GET['day'];
                // }
            ?> -->
            
            <script>
                function hashtag(text) {
                    var repl = text.replace(/#(\w+)/g, '<a class="nonevent" href="?str=$1">#$1</a>');
                    return repl;
                }
            </script>

            <!--<span id="hashtags">
                <span id="hashtagTitle">Trending tags</span><br>
                <hr>
                <?php 
                    /*$hashtags = get_hashtags();
                    if(is_array($hashtags)){
                    for($i = 0; $i<count($hashtags);$i++){
                        echo '<script>document.write(hashtag("#' . $hashtags[$i] . '"))</script><br>';
                    }
                }*/
                ?>
            </span>-->

            <!-- --------------------------TEST FOR EVENT POPUPP------------------------------------ -->
            <div id="events">


                <?php
                $event = array();
                require_once('query_auth.php');
                $event;
                if(isset($_GET['day'])){
                    $daysChosen = $_GET['day'];
                    $event = getEventByDay($daysChosen);
                }
                else if(isset($_GET['str'])){
                    $event = getHashtagEvents();
                } else {
                    $event = get_AllEvents();
                }
                if(is_array($event)){
                for ($x = 0; $x < count($event); $x++) {
                    
                    $id = $event[$x]->get_eventid();
                    $max_users = $event[$x]->get_max_users();
                    $dscp = $event[$x]->get_description();
                    $creator = $event[$x]->get_creator();
                    $pic = 'uploads/' . $id . '.jpg';
                    //TODO: Consider ajax if slow
                    $users = getEventUsers($id);
                    $numUsers = count($users);
                    $numUserText = "Users: ".$numUsers;
                    if($max_users > 0){
                        $numUserText = $numUserText . "/" . $max_users;
                    }
                    $text = "";
                    if($creator==$_SESSION['username']){
                        $text = '<div class="dropdown nonevent">
                                        <button onclick="myFunction('.$x.')" class="dropbtn">...</button>
                                            <div id="dropdown '.$x.'" class="dropdown-content">
                                                <span class ="nonevent clickable" id="dl'.$id.'">Delete</span>
                                            </div>
                                        </div>';
                        }
                        echo
                        '<div class="eventtest ' . $x . '" id="'.$event[$x]->get_title().'">
                                <section class="postsection" id="ps-'.$id.'">

                                    <div class="item1">
                                        <a href="profile.php?user='.$creator.'"><span><img class="circular--square nonevent" src="images/'.$creator.'.jpg" style="
                                        width: 70px;
                                        height:70px;
                                        overflow: hidden;
                                        border-radius: 50%; margin-left:5px; margin-right: 10px; float:left; position:relative"><p>'.$creator.'</p></span></a>
                                    '.$text.'</div>
                                    <div class="item2">' .choosePic($pic, $id).'</div>
                                    <div class="item3" style="color:#0077CC;"> <p>'
                                     . $event[$x]->get_title() .'<br></p>' .'<p>' . $date = $event[$x]->get_date() . '</p>
                                
                                    <br><p>Time: ' . $event[$x]->get_time() . '</p>
                                    <br><p>
                                    Location: <span class="events"></span> 
                                   </p><br><p>'.$numUserText. '</p> <br>' . '<script>document.write(hashtag("' . $dscp . '"))</script></div>'  . '
                                
                                    ';
                                    echo $numUsers!=$max_users || $max_users == 0 || in_array($_SESSION['username'],$users)? '<div class="item4"><button type="submit" class="button1 nonevent" id="j-' . $id . '" name="join" value="join ' . $id . '" onclick="changeButton(this)">join</button>'
                                    : '<div class="item4"> <button type ="submit" class="button2 nonevent" style="background-color:grey"> Join </button>';
                                    echo '<button type="submit" class="button1 nonevent" id="b-' . $id . '" name="bookmark" value="bookmark ' . $id . '" onclick="changeButton(this)">bookmark</button></div>
                                </section>
                            </div>';
                }
            }


                function choosePic($pic, $id)
                {
                    if (file_exists($pic)) {
                        return '<img src="uploads/' . $id . '.jpg" style= "width: 100px; height:100px; display:block; margin-left:auto; margin-right:auto; ">';
                    } else
                        return '<img src="images/eventpic.jpg" style= "width: 150px; height:150px; display:block; margin-left:20px; margin-right:20px; "
                         >';
                }


                ?>
            </div>

            

            <div class="paginationList">
                <ul class="pagination">
                    <li>
                        <a id="previous-page" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="viewMore" class="eventfeed">
              
                <section class="postsection1">
                    <P> TESTL </P>
                </section>
            </div>
            <!-- ----------------------------end of INDEXFEED------------------------------------------------------------------------->
            <script>
                /* When the user clicks on the button, 
                toggle between hiding and showing the dropdown content */
                function myFunction(number) {
                document.getElementById("dropdown "+number).classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('show')) {
                                openDropdown.classList.remove('show');
                            }
                        }
                    }
                }
            </script>
        </div>
        <div class="filterByDay">
                <h3 id="imfree">I am free on:</h3> 
                <hr>
                <form name="dayFilter" method="GET">
                    <input type="checkbox" name="day[]" value="0"><p>Mondays</p><BR>
                    <input type="checkbox" name="day[]" value="1"><p>Tuesdays</p><BR>
                    <input type="checkbox" name="day[]" value="2"><p>Wednesdays</p><BR>
                    <input type="checkbox" name="day[]" value="3"><p>Thursdays</p><BR>
                    <input type="checkbox" name="day[]" value="4"><p>Fridays</p><BR>
                    <input type="checkbox" name="day[]" value="5"><p>Saturdays</p><BR>
                    <input type="checkbox" name="day[]" value="6"><p>Sundays</p><BR>

                    <br>
                    <span class="filter-btn"><input type="submit" value="Filter feed"></span>
                </form>
                <br>
                
                <span id="hashtags">
                    <span id="hashtagTitle">Trending tags</span><br>
                    <hr>
                    <?php 
                        $hashtags = get_hashtags();
                        if(is_array($hashtags)){
                        for($i = 0; $i<count($hashtags);$i++){
                            echo '<script>document.write(hashtag("#' . $hashtags[$i] . '"))</script><br>';
                        }
                    }
                    ?>
                </span>
         </div> <br><br><br>
    </div>

    <script src="pagination.js"></script>

    <script>
        var coll = document.getElementsByClassName("three-dots");
        var i;

        for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function(event) { 
            event.stopPropagation();
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
            content.style.display = "none";
            } else {
            content.style.display = "block";
            }
        });
        }

        /*function changeButton(button){

            button.innerHTML = "Joined!";
            button.style.hover = "false";
            button.style.disabled = "true";
            button.style.backgroundColor= "#2bba75";
        }*/

    function changeButton1(button) {
        button.innerHTML = "Bookmarked!";
        button.style.hover = "false";
        button.style.disabled = "true";
    }
    var postsection = document.querySelectorAll(".postsection");

    for (let i = 0; i < postsection.length; i++) {
        postsection[i].addEventListener("click", function event(event) {
            window.location.href = 'event.php?str=' + (postsection[i].id).substring(3);
        });
    }

    var joinBookmarkButtons = document.querySelectorAll(".nonevent");
    for (let i = 0; i < joinBookmarkButtons.length; i++) {
        // button = joinBookmarkButtons[i];
        // text = button.innerHTML;
        joinBookmarkButtons[i].addEventListener("click", function nonevent(event) {
            event.stopPropagation();

        });
    }

    function changeButton(button) {
        if (button.innerHTML == "join") {
            button.innerHTML = "joined!";


            button.style.hover = "false";
            button.style.disabled = "true";
            button.style.backgroundColor = "#2bba75";

        } else if (button.innerHTML == "bookmark") {
            button.innerHTML = "bookmarked!";
            button.style.hover = "false";
            button.style.disabled = "true";
            button.style.backgroundColor = "#2bba75";
        } else if (button.innerHTML == "bookmarked!") {
            button.innerHTML = "bookmark";
            button.style.hover = "false";
            button.style.disabled = "true";
            button.style.backgroundColor = "#3489CD";
        } else if (button.innerHTML == "joined!") {
            button.innerHTML = "join";
            button.style.hover = "false";
            button.style.disabled = "true";
            button.style.backgroundColor = "#3489CD";
      }
    }
    </script>


    <script src="Map.js"></script>
    <script>
    //$event is a variable used earlier to store the list of all events from the DB
    //These 4 lines convert the event array to json and assign it to a JS array "eventArray"
    eventArray = <?php require_once('query_auth.php');

    $php_array = array();
    $php_array = $event;
    echo json_encode($php_array);?> ;

    for (let i = 0; i < eventArray.length; i++) {
        //Geolocate each event using jquery and geolocation api.
        $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?latlng=' + eventArray[i].lat + ',' + eventArray[i]
            .lng +
            '&key=AIzaSyDqe2RY-PDPAopRRejPnD2uKibuvjsEKjM',
            function(data) {
                //use the json result and take only the address from it. Change the event spans to have the addresses.
                document.getElementsByClassName("events")[i].innerHTML = data.results[0].formatted_address;
            });
    }
    </script>

    <script>
    hasJoined =[];
    hasBookmarked =[];
    hasJoined = <?php require_once('query_auth.php');
    //$joinedArray = array();
    $joinedArray = get_UserEvents($_SESSION['username']);
    echo json_encode($joinedArray);?> ;
    hasBookmarked = <?php require_once('query_auth.php');
    //$bookmarkArray = array();
    $bookmarkArray = getBookmarks($_SESSION['username']);
    echo json_encode($bookmarkArray);?>;
    
    if(hasJoined!=null){
        for (i = 0; i < hasJoined.length; i++) {
            if (document.getElementById("j-" + hasJoined[i].event_id) != null)
                changeButton(document.getElementById("j-" + hasJoined[i].event_id));
        }
    }
    console.log(hasBookmarked.length);
    if(hasBookmarked!=null){
    for (i = 0; i < hasBookmarked.length; i++) {
        //if(document.getElementById("b"+hasBookmarked[i])==null)
        if (document.getElementById("b-" + hasBookmarked[i].event_id) != null)
            changeButton(document.getElementById("b-" + hasBookmarked[i].event_id));
    }
}
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



    <script>
    function showDiv() {
        //Toggle the map option when selecting event location
        document.getElementById('map').style.display = "block";
        document.getElementById('budget-4id').style.display = "none";
    }

    function removeDiv() {
        document.getElementById('map').style.display = "none";
        document.getElementById('budget-4id').style.display = "block";
    }
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

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB07Drl0GKvcqjGeHy6W_U0XXsMzR7tMEs&callback=initMap"
        type="text/javascript">
    </script>



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

    <!-- <script>
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
    </script> -->

    <script>
    function popEvent() {


        //var eventbutton = document.getElementById('eventbutton');
        var modal2 = document.getElementById('id02');

        modal2.style.display = "block";



        window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";

            }
        }
    }
    </script>

    <script>
    function popInfo() {
        //var events = document.getElementById('events');
        var view = document.getElementById('viewMore');

        view.style.display = "block";

        window.onclick = function(event) {
            if (event.target == view) {
                console.log("worked");
                view.style.display = "none";
            }
        }
    }
    </script>



    <script src="datedropper.pro.min.js">


    </script>



    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <meta name="google-signin-client_id"
        content="991209987037-ai24ultf2fv5i9up0kiiv1bmjik38hho.apps.googleusercontent.com">



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
    $(document).ready(function() {
        $('.button1').click(function() {
            var clickBtnValue = $(this).html();
            console.log(clickBtnValue);
            var buttonid = $(this).attr('id');
            buttonid = buttonid.substring(2);
            console.log(buttonid);
            var ajaxurl = 'ajax.php',
                data = {
                    'action': clickBtnValue,
                    'id': buttonid
                };
            $.post(ajaxurl, data, function(response) {
                // Response div goes here.
                //alert(response);
            });
        });
        $('.clickable').click(function() {
            var clickBtnValue = $(this).html();
            console.log(clickBtnValue);
            var buttonid = $(this).attr('id');
            buttonid = buttonid.substring(2);
            console.log(buttonid);
            var ajaxurl = 'ajax.php',
                data = {
                    'action': clickBtnValue,
                    'id': buttonid
                };
            $.post(ajaxurl, data, function(response) {
                // Response div goes here.
                //alert(response);
                location.reload();
            });
        });
    });
    </script>






    <script>
    //Handles the event form time. Also adds a time graphic on the side that updates based on the time that was input.
    document.querySelector("#time").addEventListener("input", function(e) {
        const reTime = /^([0-1][0-9]|2[0-3]):[0-5][0-9]$/;
        const time = this.value;
        if (reTime.exec(time)) {
            const minute = Number(time.substring(3, 5));
            const hour = Number(time.substring(0, 2)) % 12 + (minute / 60);
            this.style.backgroundImage =
                `url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='40' height='40'><circle cx='20' cy='20' r='18.5' fill='none' stroke='%23222' stroke-width='3' /><path d='M20,4 20,8 M4,20 8,20 M36,20 32,20 M20,36 20,32' stroke='%23bbb' stroke-width='1' /><circle cx='20' cy='20' r='2' fill='%23222' stroke='%23222' stroke-width='2' /></svg>"), url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='40' height='40'><path d='M18.5,24.5 19.5,4 20.5,4 21.5,24.5 Z' fill='%23222' style='transform:rotate(${360 * minute / 60}deg); transform-origin: 50% 50%;' /></svg>"), url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='40' height='40'><path d='M18.5,24.5 19.5,8.5 20.5,8.5 21.5,24.5 Z' style='transform:rotate(${360 * hour / 12}deg); transform-origin: 50% 50%;' /></svg>")`;
        }
    });
    </script>

    <script>
    function search(keyword) {
        if (event.key === 'Enter') {
            submitFunction();
        }
    }
    </script>


    <script>
    
    function getProfile(profile){



        var url  = "profile.php?user="+profile;
        //alert(url);
        window.location.replace(url);
        
    }
    
    
    </script>



    <script>
    
    function getAnalytics(event){

            // alert(event);



            $.ajax({
                type: 'post',
                url: 'cookies.php',
                data: {
                    event:event
                },
                success: function(response) {
                   console.log(response);
                }
            });
    
        
    }
    </script>



</body>

</html>