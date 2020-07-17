<?php
session_start();
require_once('init.php');

if (!isset($_GET['user'])) {
    header('Location: home');
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




    <title>COURSEWORK</title>

    <script src="https://use.fontawesome.com/a31a0bdd36.js"></script>

    <script src="https://kit.fontawesome.com/d0528b62e3.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="normalize.css"> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="personal-infostyle.css">
   
    <link rel="stylesheet" href="section-sidebar.css">
    <link rel="stylesheet" href="radio.css">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" />
    
    <link rel="stylesheet/less" type="text/css" href="idk.less" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" />


    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />


    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script> -->

   <!-- <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>


    <title>COURSEWORK</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="normalize.css"> -->
    <!--<link rel="stylesheet" href="radio.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="section-sidebar.css">
    <link rel="stylesheet" href="personal-infostyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->



</head>

<body>

    <nav>

        <div class="logo">
            <a href="home" class="logolink"> <img src="images/logo.png"> </a>

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

 



  

    <div class="indexcontainer">
        
        
        
        
    <div class="section-sidebar">
            <br>

            <!-- this button is serves as a login button or account button based on php user session -->
            

           


            <section class="stealthy-scroll-container">




                <ul class="sidebar-nav">

                    <a href="profile.php?user=<?php echo $_SESSION['username'] ?>">

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
                            <i class="fas fa-home"></i>
                            <p>Home</p>

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


        <div class="index-account">

            <?php

            require_once('authenticate.php');
            require_once('query_auth.php');
            //$u = get_username();
            if (isset($_GET['user'])) {


                $id = $_GET['user'];

                if (get_email($id) != "") {
                    echo ($_SESSION['username'] == $_GET['user']) ? "<script>document.getElementsByClassName('prof')[0].style.color='#52E34D';</script><div class='personal-container'>
        <div class='avatar-upload'>
            <div class='avatar-edit'>
                <input type='file' id='imageUpload' accept='.png, .jpg, .jpeg' />
                <label for='imageUpload' id = 'edit-label'></label>
            </div>
            <div class='avatar-preview'>
                <div id='imagePreview' style='background-image: url(images/$u.jpg);'>
                </div>
            </div>
        </div>
    </div>" :  "<div class='personal-container'>
        <div class='avatar-upload'>

            <div class='avatar-preview'>
                <div id='imagePreview' style='background-image: url(images/$id.jpg);'>
                </div>
            </div>
        </div>
    </div>";

    echo '<h1>'.$id.'</h1> <br><br>';


    echo ' 
<button class="btn1">Events Created</button>
<button class="btn2">Joined Events</button>
    
    <div class="your-events">
        <p>These are your events</p>
    </div>

    
    <div class="joined-events">
        <p>These are joined events</p>
    </div>

</div>
</div>';
                $creator = $_GET['user'];
                if(isset($_GET['str'])) {
                    $event = get_UserEvents($_GET['user']);
                }else{
                    $event=getCreatorEvents($creator);  
                }
                
                
                if($event == null){
                    echo '<br><p> No events :(  </p>';
                }else{         
                    for ($x = 0; $x < count($event); $x++) {
                    
                        $id = $event[$x]->get_eventid();
                        $max_users = $event[$x]->get_max_users();
                        $dscp = $event[$x]->get_description();
                        $creator = $event[$x]->get_creator();
                        $pic = 'uploads/' . $id . '.jpg';
                        $text = "";
                        //TODO: Consider ajax if slow
                        $users = getEventUsers($id);
                        $numUsers = count($users);
                        $numUserText = "Users: ".$numUsers;
                        $text;
                        if($max_users > 0){
                            $numUserText = $numUserText . "/" . $max_users;
                        }
                        
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
                                <section class="postsection" style ="width:60%"id="ps-'.$id.'">

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
            } else {
                echo "<h1>No such profile</h1>";
            }
        } else {
            echo "<h1>Nothing to show here</h1>";
        }
        function choosePic($pic, $id)
                {
                    if (file_exists($pic)) {
                        return '<img src="uploads/' . $id . '.jpg" style= "width: 100px; height:100px; display:block; margin-left:auto; margin-right:auto; margin-top:20px;">';
                    } else
                        return '<img src="images/eventpic.jpg" style= "width: 100px; height:100px; display:block; margin-left:auto; margin-right:auto; margin-top:20px;"
                         >';
                }
?>
            <script>
                var user = "";
                user += "<?php echo $_GET['user'] ?>";

                document.querySelector(".btn1").addEventListener("click", function() {
                    document.querySelector(".your-events").style.display = "block";
                    document.querySelector(".joined-events").style.display = "none";
                    document.querySelector(".btn1").style.backgroundColor = "rgb(43, 117, 186)";
                    document.querySelector(".btn2").style.backgroundColor = "black";
                    window.location.href = "profile.php?user=" + user;
                });


                document.querySelector(".btn2").addEventListener("click", function() {
                    document.querySelector(".joined-events").style.display = "block";
                    document.querySelector(".your-events").style.display = "none";
                    document.querySelector(".btn2").style.backgroundColor = "rgb(43, 117, 186)";
                    document.querySelector(".btn1").style.backgroundColor = "black";
                    window.location.href = "profile.php?user=" + user + "&str=joinedevents";
                });
            </script>

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

            <script>
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

            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB07Drl0GKvcqjGeHy6W_U0XXsMzR7tMEs&callback=initMap" type="text/javascript"></script>
            <script src="Map.js"></script>
            <script>
                //$event is a variable used earlier to store the list of all events from the DB
                //These 4 lines convert the event array to json and assign it to a JS array "eventArray"
                eventArray = <?php require_once('query_auth.php');

                                $php_array = array();
                                $php_array = $event;
                                echo json_encode($php_array); ?>;

                for (let i = 0; i < eventArray.length; i++) {
                    //Geolocate each event using jquery and geolocation api.
                    $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?latlng=' + eventArray[i].lat + ',' + eventArray[i].lng +
                        '&key=AIzaSyDqe2RY-PDPAopRRejPnD2uKibuvjsEKjM',
                        function(data) {
                            //use the json result and take only the address from it. Change the event spans to have the addresses.
                            document.getElementsByClassName("events")[i].innerHTML = data.results[0].formatted_address;
                        });
                }
            </script>




            <!--

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
-->



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





            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB07Drl0GKvcqjGeHy6W_U0XXsMzR7tMEs&callback=initMap" type="text/javascript">
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
                        if (event.target == view || event.target == document.querySelector(".button1")) {
                            console.log("worked");
                            view.style.display = "none";
                        }
                    }
                }
            </script>


            <script src="datedropper.pro.min.js">


            </script>



            <script src="https://apis.google.com/js/platform.js" async defer></script>

            <meta name="google-signin-client_id" content="991209987037-ai24ultf2fv5i9up0kiiv1bmjik38hho.apps.googleusercontent.com">



            <script>
                n = new Date();
                y = n.getFullYear();
                m = n.getMonth() + 1;
                d = n.getDate();
                var l = document.getElementById("date1");

                l.value = m + "/" + d + "/" + y;


                $("#date1").dateDropper({});
            </script>


<script>
    hasJoined =[];
    hasBookmarked =[];
    hasJoined = <?php require_once('query_auth.php');
    //$joinedArray = array();
    $joinedArray = get_UserEvents($_GET['user']);
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


            <script type="text/javascript">
                $(document).ready(function() {
                    $('.button').click(function() {
                        var clickBtnValue = $(this).val();
                        var ajaxurl = 'ajax.php',
                            data = {
                                'action': clickBtnValue
                            };
                        $.post(ajaxurl, data, function(response) {
                            // Response div goes here.
                            //alert("action performed successfully");
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
                function read_only() {
                    var x = document.getElementsByTagName("h5")[0];
                    x.outerHTML = "<h6 style='color:#f44336;'>You cannot change the username</h6>"
                }
            </script>




            <script>
                document.querySelector("html").classList.add('js');

                var fileInput = document.querySelector(".input-file"),
                    button = document.querySelector(".input-file-trigger"),
                    the_return = document.querySelector(".file-return");

                button.addEventListener("keydown", function(event) {
                    if (event.keyCode == 13 || event.keyCode == 32) {
                        fileInput.focus();
                    }
                });
                button.addEventListener("click", function(event) {
                    fileInput.focus();
                    return false;
                });
                fileInput.addEventListener("change", function(event) {
                    the_return.innerHTML = this.value;

                });
            </script>

            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                            $('#imagePreview').hide();
                            $('#imagePreview').fadeIn(650);

                            var $data = {
                                'title': 'Sample Photo Title',
                                'file': reader.result
                            };
                            $.ajax({
                                type: 'POST',
                                url: 'upload-pic.php',
                                data: $data,
                                success: function(response) {

                                },
                                error: function(response) {
                                    alert(response);

                                },
                            });
                        }
                        reader.readAsDataURL(input.files[0]);
                        //     reader.onload = function(){
                        //     var $data = { 'title': 'Sample Photo Title', 'file': reader.result };
                        //     $.ajax({
                        //         type: 'POST',
                        //         url: 'test.php',
                        //         data: $data,
                        //         success: function(response) {
                        //             window.location.reload(true);
                        //         },
                        //         error: function(response) {
                        //             alert(response);

                        //         },
                        //     });
                        // };
                        reader.readAsDataURL($("#file-to-upload").get(0).files[0]);
                    }
                }
                $("#imageUpload").change(function() {
                    readURL(this);
                });
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
    });
    </script>





</body>

</html>