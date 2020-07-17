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
    
   


    <title>PickUp</title>

    <script src="https://use.fontawesome.com/a31a0bdd36.js"></script>

    <script src="https://kit.fontawesome.com/d0528b62e3.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="normalize.css"> -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="personal-infostyle.css">
    <link rel="stylesheet" href="accountstyle.css">
    <link rel="stylesheet" href="section-sidebar.css">
    <link rel="stylesheet" href="radio.css">
    <link rel="stylesheet" href="pagination.css">
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
                            <p class="prof" style="color: rgb(82, 227, 77);">Profile</p>
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


        <div class="index-account">

            <?php

        require_once('authenticate.php');
        $u = get_username();

        echo (isset($_SESSION['username']) ?  "<div class='personal-container'>
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
    </div>" :  "<img class='circular--square' src='images/avatar.png' style='margin-top:2%;'>");
        ?>

        <h1><?php echo (isset($_SESSION['username']) ? $_SESSION['username'] : ""); ?></h1>
        
            <br>
            <br>
            <div class="menu-buttons">
                <button>Your Events</button>
                <button>Joined Events</button>
                
            </div>
           
            
            <div class="your-events">
                <p>These are your events</p>
            </div>

            
            <div class="joined-events">
                
                            <div id="events">


                <?php
                require_once('query_auth.php');
                $event;
                if(isset($_GET['str'])){
                    $event = getHashtagEvents();
                }else{
                    $event = get_UserEvents($_SESSION['username']);
                }
                if(empty($event)){
                    echo '<br><br><p>No events to display :(</p>';
                
                }else{

                for ($x = 0; $x < sizeof($event); $x++) {

                    $id = $event[$x]->get_eventid();
                    $dscp = $event[$x]->get_description();
                    $pic = 'uploads/' . $id . '.jpg';

                    echo
                        '<div class="eventtest ' . $x . '" id="eventtest ' . $x . '">
                                <section class="postsection" id="ps-'.$id.'">
                                <h1 style="color:#0077CC;">
                                    ' . $event[$x]->get_title() . '
                                </h1> 
                                <p>' . $date = $event[$x]->get_date() . '</p>
                                
                                    Time: ' . $event[$x]->get_time() . '
                                    <br>
                                    Location: <span class="events"></span> 
                                    
                                    
                                

                                ' . choosePic($pic, $id) . '<br>' . '<script>document.write(hashtag("' . $dscp . '"))</script>'  . '
                                
                                <button type="submit" class="button1 nonevent" id="j-' . $id . '" name="join" value="join ' . $id . '" onclick="changeButton(this)">join</button>
                                <button type="submit" class="button1 nonevent" id="b-' . $id . '" name="bookmark" value="bookmark ' . $id . '" onclick="changeButton(this)">bookmark</button>
                                </section>
                            </div>';
                    
                }
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
            </div>

        </div>
    </div>
    
    <script src="pagination.js"></script>
    
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
     
    <script>
        document.querySelector(".btn1").addEventListener("click", function(){
        // document.querySelector(".your-events").style.display = "block";
        // document.querySelector(".joined-events").style.display = "none";
        document.querySelector(".btn1").style.backgroundColor = "rgb(43, 117, 186)";
        document.querySelector(".btn2").style.backgroundColor = "black";
        });
        
        document.querySelector(".btn2").addEventListener("click", function(){
        document.querySelector(".joined-events").style.display = "block";
        document.querySelector(".your-events").style.display = "none";
        document.querySelector(".btn2").style.backgroundColor = "rgb(43, 117, 186)";
        document.querySelector(".btn1").style.backgroundColor = "black";
        });
    
    </script>
    
    
    
    
    
    <script>
        /*function changeButton(button){
            button.innerHTML = "Joined!";
            button.style.hover = "false";
            button.style.disabled = "true";
            button.style.backgroundColor= "#2bba75";
        }
        function changeButton1(button){
            button.innerHTML = "Bookmarked!";
            button.style.hover = "false";
            button.style.disabled = "true";
            button.style.backgroundColor= "#2bba75";
        }*/
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





    <script type="text/javascript">
       $(document).ready(function(){
        $('.button').click(function(){
            var clickBtnValue = $(this).val();
            var ajaxurl = 'ajax.php',
            data =  {'action': clickBtnValue};
            $.post(ajaxurl, data, function (response) {
                // Response div goes here.
                //alert("action performed successfully");
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




    <script>document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
      
button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});  
fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value; 
    
});  </script>

<<script>

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
             $('#imagePreview').hide();
             $('#imagePreview').fadeIn(650);

             var $data = { 'title': 'Sample Photo Title', 'file': reader.result };
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







</body>

</html>