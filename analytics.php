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
     <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="radio.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="section-sidebar.css">
    <link rel="stylesheet" href="post-Event.css">
    <link rel="stylesheet" href="pagination.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 


    <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

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



  


    <div class="indexcontainer">

        <div class="section-sidebar">
            <br>

            <!-- this button is serves as a login button or account button based on php user session -->





            <section class="stealthy-scroll-container">




                <ul class="sidebar-nav">

                <a href="account.php">
                        
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


        <h1>Analytics</h1>



        <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
A basic column representation of the three most clicked events
    </p>
</figure>












        </div>


    </div>


           <script>

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Event Stats'
    },
    subtitle: {
        text: 'Source: pickup'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Event Popularity'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} clicks</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },

    <?php


  require_once('getAnalytics.php');


$test = bestEvents();


//print_r($test);


//echo count($test);

for($x = 0 ; $x < count($test);$x++){
    $mostused[] = $test[$x]->name;
}

$frequent_events = array_count_values($mostused);

//print_r(array_count_values($mostused));

for($x = 0 ; $x < count($frequent_events) ; $x++){
    $thekeys = array_keys($frequent_events);
}

//print_r($thekeys);



for($x = 0 ; $x <= count($thekeys) ; $x++){

    for($j= 0 ; $j < count($test);$j++){
    if($thekeys[$x] == $test[$j]->name){
       
        $count+= $test[$j]->clicks;

    }
   
    }

    $event = new bestEvent($thekeys[$x],$count);

    $finalarray[] = $event;

    $count = 0;
}





$firstclicks = $finalarray[0]->clicks;
$secondclicks = $finalarray[1]->clicks;
$thirdclicks = $finalarray[2]->clicks;
$fourthclicks = $finalarray[3]->clicks;



    
    
    echo "series: [{
        name: '".$finalarray[0]->name."',
        data: [0,0, 0,$firstclicks, 0, 0, 0, 0, 0, 0, 0, 0]

    }, {
        name: '".$finalarray[1]->name."',
        data: [0, 0, 0, 0, $secondclicks, 0, 0, 0, 0, 0, 0, 0]

    }, {
        name: '".$finalarray[2]->name."',
        data: [0, 0, 0, 0,$thirdclicks, 0, 0, 0,0, 0, 0, 0]

    } ]"?>




});
           </script>






    <script>
        

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
    $joinedArray = get_UserEvents();
    echo json_encode($joinedArray);?> ;
    hasBookmarked = <?php require_once('query_auth.php');
    //$bookmarkArray = array();
    $bookmarkArray = getBookmarks();
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