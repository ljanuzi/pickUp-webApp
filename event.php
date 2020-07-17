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
    
    <link rel="stylesheet" href="date-picker.css">

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" />


    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />


    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script> -->

    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>


    <title>PickUp</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="normalize.css"> -->
    <link rel="stylesheet" href="radio.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="section-sidebar.css">
    <link rel="stylesheet" href="post-Event.css">
    <link rel="stylesheet" href="pagination.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">



</head>

<body>

    <<nav>

        <div class="logo">
            <a href="landing.php" class="logolink"> <img src="images/logo.png"> </a>

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


    <!-- ------------------------------------------------ -->

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
            
            <script>
                function hashtag(text) {
                    var repl = text.replace(/#(\w+)/g, '<a class="nonevent" href="landing.php?str=$1">#$1</a>');
                    return repl;
                }
            </script>


            <!-- --------------------------TEST FOR EVENT POPUPP------------------------------------ -->
            <div id="events">


                <?php
                require_once('query_auth.php');
                
                $event=get_event($_GET['str']);
                if(empty($event)){
                    echo '<br><br><p>Error 404  </p>';
                
                }else{ 
                                    
                    $id = $event->get_eventid();
                    $max_users = $event->get_max_users();
                    $dscp = $event->get_description();
                    $creator = $event->get_creator();
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
                                        <button onclick="myFunction(0)" class="dropbtn">...</button>
                                            <div id="dropdown 0" class="dropdown-content">
                                                <span class ="nonevent clickable" id="dl'.$id.'">Delete</span>
                                            </div>
                                        </div>';
                        }
                        echo
                        '<div class="eventtest" id="'.$event->get_title().'">
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
                                     . $event->get_title() .'<br></p>' .'<p>' . $date = $event->get_date() . '</p>
                                
                                    <br><p>Time: ' . $event->get_time() . '</p>
                                    <br><p>
                                    Location: <span id="geolocation"></span> 
                                   </p><br><p>'.$numUserText. '</p> <br>' . '<script>document.write(hashtag("' . $dscp . '"))</script></div>'  . '
                                
                                    ';
                                    echo $numUsers!=$max_users || $max_users == 0 || in_array($_SESSION['username'],$users)? '<div class="item4"><button type="submit" class="button1 nonevent" id="j-' . $id . '" name="join" value="join ' . $id . '" onclick="changeButton(this)">join</button>'
                                    : '<div class="item4"> <button type="submit" class="button2 nonevent" style="background-color:grey"> Join </button>';
                                    echo '<div class "item4"><button type="submit" class="button1 nonevent" id="b-' . $id . '" name="bookmark" value="bookmark ' . $id . '" onclick="changeButton(this)">bookmark</button></div>
                                </section>
                            </div>';
                
                            foreach($users as $user){
                                echo '<a href="profile.php?user='.$user.'"><img class="circular--square nonevent" src="images/'.$user.'.jpg" style="
                                width: 70px;
                                height:70px;
                                overflow: hidden;
                                border-radius: 50%; margin-top:2%;margin-left:5px; margin-right: 10px; float:left; position:relative"><br><span style="float:left">'.$user.'</span><br><br> </a>';
                            }
                        }
                
            


                function choosePic($pic, $id)
                {
                    if (file_exists($pic)) {
                        return   '<img src="uploads/' . $id . '.jpg" style= "width: 100px; height:100px; display:block; margin-left:auto; margin-right:auto; margin-top:20px;">';
                    } else
                        return '<img src="images/eventpic.jpg" style= "width: 100px; height:100px; display:block; margin-left:auto; margin-right:auto; margin-top:20px;"
                         >';
                }


                ?>
            </div>

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

            <div class="paginationList">
                <ul class="pagination">
                    <li>
                        <a id="previous-page" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- ----------------------------end of INDEXFEED------------------------------------------------------------------------->

        </div>
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
    echo json_encode($event);?> ;
    console.log(eventArray);
    
        //Geolocate each event using jquery and geolocation api.
        console.log("inside for looop")
        $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?latlng=' + eventArray.lat + ',' + eventArray.lng +
            '&key=AIzaSyDqe2RY-PDPAopRRejPnD2uKibuvjsEKjM',
            function(data) {
                //use the json result and take only the address from it. Change the event spans to have the addresses.
                document.getElementById("geolocation").innerHTML = data.results[0].formatted_address;
            });
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





    <script src="index.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


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