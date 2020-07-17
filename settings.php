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
    
    <link rel="stylesheet" href="settings.css">

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="body.css">



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


                    <a href="settings.php" >
                        <li>
                            <i class="fas fa-cog" style="color: rgb(82, 227, 77);"></i>
                            <p class="settingsfafa" style="color: rgb(82, 227, 77);">Settings</p>

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

        <div class="index-settings">

            <button type="button" class="collapsible">Account Settings</button>
            <div class="content">
                <p>Name
                    <br>
                    <span class="settingInfo">
                        <?php
                        require_once('query_auth.php');
                        $u = get_name($_SESSION['username']);
                        echo (isset($_SESSION['username']) ? "$u " : "");
                        ?>
                    </span>
                </p>
                <hr>
                <p>Username
                    <br>
                    <span class="settingInfo">
                        <?php require_once('authenticate.php');
                        $u = get_username();
                        echo (isset($_SESSION['username']) ? "$u" : "");
                        ?>
                    </span>
                </p>
                <hr>
                <p>
                    Email
                    <br>
                    <span class="settingInfo">
                        <?php
                        require_once('query_auth.php');
                        $u = get_email($_SESSION['username']);
                        echo (isset($_SESSION['username']) ? "$u" : "");
                        ?>
                    </span>
                </p>
                <hr>
                <p>Password</p>
                <hr>
                <button type="button" class="collapsible" id="innerButton">Edit</button>
                <div class="content">
                    <br>
                    <form action="PI-edit.php" class="editAccInfo" method="POST" onsubmit="return save_changes();">


                        <legend class="infoBoxLegend"><?php require_once('authenticate.php');
                                                        $u = get_username();
                                                        echo (isset($_SESSION['username']) ? "@$u account details" : " ");
                                                        ?>
                        </legend>
                        <hr>

                        <br>
                        <div class="infoBox">
                            <label for="nameBox" >Name</label>
                            <br>
                            <input id="nameBox" name="nameBox" class="infoBoxName" type="text" <?php require_once('query_auth.php');
                                                                                                $u = get_name($_SESSION['username']);
                                                                                                echo (isset($_SESSION['username']) ? "value='$u' " : "");
                                                                                                ?>>
                        </div>

                        <div class="infoBox">
                            <br>
                            <label for="currentPassword" class="infoBoxLabel">Current Password</label>
                            <br>
                            <input id="currentPassword" name="currentPassword" class="infoBoxField" type="password" value="">

                        </div>

                        <div class="infoBox">

                            <label for="newPassword" class="infoBoxLabel">New Password</label>
                            <br>
                            <input id="newPassword" name="newPassword" class="infoBoxField" type="password">
                        </div>

                        <div class="infoBox">

                            <label for="confirmPassword" class="infoBoxLabel">Confirm Password</label>
                            <br>
                            <input id="confirmPassword" name="confirmPassword" class="infoBoxField" type="password">
                        </div>

                        <br>

                        <input type="submit" value="post" id="postsectionsubmit" class="s-confirm" />
                    </form>
                </div>
            </div>
            <button type="button" class="collapsible">About</button>
            <div class="content">
                <button type="button" class="collapsible">What is PickUp</button>
                <div class="content">
                    <p>Pick up is an online platform for creating events. 
                        The objective is to create an online social community 
                        through which people can connect by joining and creating
                        their own events.</p>
                </div>
                <button type="button" class="collapsible">About Us</button>
                <div class="content">
                    <p>
                        Lola D <br>
                        Learta J <br>
                        Memli R<br>
                        Ardit Y<br>
                    </p>
                </div>
            </div>
            <button type="button" class="collapsible">Help Center</button>
            <div class="content">
                <button type="button" class="collapsible">Create Event</button>
                <div class="content">
                    <p>On the homepage there is a "Host Event" button that
                        allows the users to create events. A pop-up form appears,
                        on which the user can specify the details about the event that
                        he/she wishes to create.
                    </p>
                </div>
                
            </div>
            <button type="button" class="collapsible">Terms and conditions</button>
            <div class="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <button type="button" class="collapsible">Contact us</button>
            <div class="content">
                <a href="contact-us.html"><p>Report a problem</p></a>
            </div>
        </div>
    </div>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>

    <script>
        function popEditInfo() {


            var eventbutton = document.getElementById('editButton');
            var modal2 = document.getElementById('info');

            modal2.style.display = "block";



            window.onclick = function(event) {
                if (event.target == modal2) {
                    modal2.style.display = "none";

                }
            }
        }
    </script>

    <script>
        var openbtns = document.getElementsByClassName("open");
        var i;

        for (i = 0; i < openbtns.length; i++) {
            openbtns[i].addEventListener("open", function() {
                this.parentElement.style.display = 'none';
            });
        }
    </script>

    <!-- form personal-info.php -->
    <script src="index.js"></script>

    <script type="text/javascript">
        function save_changes() {
            var currentpassword = $("#currentPassword").val();


            if (currentpassword == "") {

                var name = $("#nameBox").val();
                var email = $("#customerEmail").val();

                $.ajax({
                    type: 'post',
                    url: 'PI-edit.php',
                    data: {
                        save_changes: "save_changes",
                        name: name,
                        email: email
                    },
                    success: function(response) {
                        if (response == 1) {
                            var s_confirm = document.querySelector('.s-confirm');
                            s_confirm.classList.toggle('s-confirm-done');
                            return true;

                        } else if (response == 2) {
                            return false;
                        }
                    }
                });
                return false;
            } else if (currentpassword != undefined) {
                var pass = $("#confirmPassword").val();
                var password = $("#newPassword").val();


                $.ajax({
                    type: 'post',
                    url: 'PI-edit.php',
                    data: {
                        save_changes: "save_changes",
                        password: pass,
                        currentpassword: currentpassword
                    },
                    success: function(response) {

                        if (response == 1) {
                            $("#confirmPassword").val("");
                            $("#newPassword").val("");
                            $("#currentPassword").val("");

                            var s_confirm = document.querySelector('.s-confirm');
                            s_confirm.classList.toggle('s-confirm-done');
                            return true;

                        } else if (response == 2) {
                            swal({
                                title: " One of the Passwords is Wrong",
                                type: "error",
                                showConfirmButton: true,
                                showCancelButton: false,
                                customClass: "Custom_Cancel",
                                confirmButtonColor: "#DD6B55"
                            });
                        }

                    }
                });

            }


            return false;
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
        // reader.onload = function(){
        // var $data = { 'title': 'Sample Photo Title', 'file': reader.result };
        // $.ajax({
        // type: 'POST',
        // url: 'test.php',
        // data: $data,
        // success: function(response) {
        // window.location.reload(true);
        // },
        // error: function(response) {
        // alert(response);

        // },
        // });
        // };
        reader.readAsDataURL($("#file-to-upload").get(0).files[0]);
        }
        }
        $("#imageUpload").change(function() {
        readURL(this);
        });
        </script>

        <!-- end of personal-info.php stolen functions -->


        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB07Drl0GKvcqjGeHy6W_U0XXsMzR7tMEs&callback=initMap" type="text/javascript"></script>



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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script src="Map.js"></script>

        <script>
            function showDiv() {
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



        <!--<script>
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
            function popEvent() {


                var eventbutton = document.getElementById('eventbutton');
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
                var events = document.getElementById('events');
                var view = document.getElementById('viewMore');

                viewMore.style.display = "block";

                window.onclick = function(event) {
                    if (event.target == view) {
                        view.style.display = "none";
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



        <script src="https://apis.google.com/js/platform.js" async defer></script>

        <meta name="google-signin-client_id" content="991209987037-ai24ultf2fv5i9up0kiiv1bmjik38hho.apps.googleusercontent.com">


        <script>
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


                setTimeout(function() {
                    window.location.replace("index.php");
                }, 2000);

                ///setTimeout(() => {    }, 1200);



            }
        </script>






        <script>
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
            const input = document.getElementById("search-input");
            const searchBtn = document.getElementById("search-btn");

            const expand = () => {
                searchBtn.classList.toggle("close");
                input.classList.toggle("square");
            };

            searchBtn.addEventListener("click", expand);
        </script>

        <script>
            function search(keyword) {
                if (event.key === 'Enter') {
                    submitFunction();
                }
            }
        </script>



</body>

</html>