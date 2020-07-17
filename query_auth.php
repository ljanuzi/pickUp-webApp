<?php
require_once('init.php');


function verify_user($username, $password)
{
    $conn = db_connect();
    $sql = "SELECT username,password FROM user";


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            $usr = $row["username"];
            $psw = $row["password"];
            if ($username == $usr) {
                if ($psw == $password) {
                    $success = true;
                    return true;
                } else {
                    return false;
                }
                break;
            }
        }
    }
}


function get_name($username)
{

    $conn = db_connect();

    $sql = "SELECT name FROM user WHERE username='" . $username . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            $usr = $row["name"];
            return $usr;
        }
    }
}

function get_email($username)
{
    $conn = db_connect();

    $sql = "SELECT email FROM user WHERE username='" . $username . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            $email = $row["email"];
            return $email;
        }
    }
}


function get_password($username)
{
    $conn = db_connect();

    $sql = "SELECT password FROM user WHERE username='" . $username . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            $password = $row["password"];
            return $password;
        }
    }
}



function insert_event($event_id,$date, $time, $title, $lat, $lng, $dscp, $max_users)
{
    $username = $_SESSION['username'];
    $pdo = new PDO('mysql:host=localhost;dbname=cwtest1', 'learta', '123');

    $query = "INSERT INTO events (event_id , date_of_event, time_of_event, subject,max_users,duration_of_event,lat,lng,description,creator) 
    VALUES(?,?,?,?,?,?,?,?,?,?);";
    $stmt = $pdo->prepare($query);
    //the id is now creared on post-Event.php 
    // $randomNumber = rand(10, 200);
    // $stmt->execute([$randomNumber, $date, $time, $title, 4, $time, $lat, $lng]);
    $stmt->execute([$event_id, $date, $time, $title, $max_users, $time, $lat, $lng, $dscp, $username]);
    insert_hashtag($event_id,$dscp);
}

function get_hashtags(){
    $conn = db_connect();
    $sql = "SELECT hashtag_name,count(event_id) from hashtag WHERE event_id IN (select event_id from events WHERE date_of_posting >= DATE_ADD(now(), INTERVAL -7 DAY)) group by hashtag_name order by count(event_id) desc limit 5;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $hashtags = array();
        for ($x = 0; $x < $result->num_rows; $x++) {
            $row = $result->fetch_assoc();

            $hashtag = $row["hashtag_name"];


            //Push into array of event objects
            array_push($hashtags, $hashtag);
        }

        return $hashtags;
    }
}


function get_event()
{
    $event_id = $_GET["str"];
    $conn = db_connect();
    $sql = "SELECT * from events where event_id like '$event_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            $event_id = $row["event_id"];
            $date = $row["date_of_event"];
            $time = $row["time_of_event"];
            $title = $row["subject"];
            $lat = $row["lat"];
            $lng = $row["lng"];
            $description = $row["description"];
            $creator = $row["creator"];
            $max_users = $row["max_users"];
        }
        $event = new Event($event_id, $date, $time, $title, $lat, $lng, $description,$creator, $max_users);
        //echo $event->get_title();
        return $event;
    }
}

function get_UserEvents($username)
{
    //Returns all the events in which the user is participating in
    $conn = db_connect();

    $sql = "SELECT * from events
            where events.event_id in 
            (select event_id from isin where user_id = '$username');";

    $result = $conn->query($sql);
    return makeEvent($result);
    
}

function deleteEvent($event){
    $conn = db_connect();
    $sql = "DELETE FROM isin WHERE event_id = '$event'";
    $conn->query($sql);
    $sql = "DELETE FROM bookmarks WHERE event_id = '$event'";
    $conn->query($sql);
    $sql ="DELETE FROM hashtag WHERE event_id = '$event'";
    $conn->query($sql);
    $sql ="DELETE FROM events WHERE event_id = '$event'";
    $conn->query($sql);
      
}

function unJoinEvent($event_id){
    //$event_id = $_GET["str"];
    $conn = db_connect();
    $username = $_SESSION['username'];
    $sql = "DELETE FROM isin WHERE event_id = '$event_id' and user_id = '$username'";
    $conn->query($sql);
}

function unBookMarkEvent($event_id){
    //$event_id = $_GET["str"];
    $conn = db_connect();
    $username = $_SESSION['username'];
    $sql = "DELETE FROM bookmarks WHERE event_id = '$event_id' and user_id = '$username'";
    $conn->query($sql);
}

function joinEvent($event_id){
    $conn = db_connect();
    $pdo = new PDO('mysql:host=localhost;dbname=cwtest1', 'learta', '123');

    $query = "INSERT INTO isin (event_id, user_id) 
    VALUES(?,?);";
    $stmt = $pdo->prepare($query);

    $username = $_SESSION['username'];
    $stmt->execute([$event_id,$username]);
}
function bookmarkEvent($event_id){
    $conn = db_connect();
    $pdo = new PDO('mysql:host=localhost;dbname=cwtest1', 'learta', '123');

    $query = "INSERT INTO bookmarks (event_id, user_id) 
    VALUES(?,?);";
    $stmt = $pdo->prepare($query);

    $username = $_SESSION['username'];
    $stmt->execute([$event_id,$username]);
}

function insert_hashtag($event_id, $dscp){
    $conn = db_connect();
    $pdo = new PDO('mysql:host=localhost;dbname=cwtest1', 'learta', '123');

    $query = "INSERT INTO hashtag (event_id, hashtag_name) 
    VALUES(?,?);";

    preg_match_all('/#(\w+)/', $dscp, $matches);
    /* Add all matches to array */
    foreach ($matches[1] as $match) {
        $hashtags[] = $match;
    }
    $stmt = $pdo->prepare($query);
    for($i = 0; $i < count($hashtags); $i++){
        if(strlen($hashtags[$i]) <30)
        $stmt->execute([$event_id,$hashtags[$i]]);
    }
}


function getEventUsers($event_id){
    $conn = db_connect();
    $sql = "SELECT user_id from isin where event_id = '$event_id' ";
    $result = $conn->query($sql);
    $users = [];
    if ($result->num_rows > 0) {
        for ($x = 0; $x < $result->num_rows; $x++) {
            $row = $result->fetch_assoc();
            $user_id = $row["user_id"];
            array_push($users,$user_id);
        }
    }
    return $users;
}

function getBookmarks($username)
{
    //Returns all the events which the logged in user has bookmarked

    $conn = db_connect();

    $sql = "SELECT * from events
            where events.event_id in 
            (select event_id from bookmarks where user_id = '$username');";

    $result = $conn->query($sql);
    return makeEvent($result);
}

function getHashtagEvents(){
    $conn = db_connect();
    $hashtag = $_GET['str'];
    //$hashtagF = substr($hashtag,1);
    $sql = "SELECT * from events
            where events.event_id in 
            (select event_id from hashtag where hashtag_name like '$hashtag');";

    $result = $conn->query($sql);
    return makeEvent($result);
}

function getEventByDay($day){

    $conn = db_connect();
    //$day = $_GET['day'];
    //LEARTAAAAA: make sure that you only get the numbers form GET day, and not the whole thing!!!!!!!!!!!!!!!!!!!

    $sql = "SELECT * FROM events WHERE WEEKDAY(date_of_event) IN (NOT NULL ";
    foreach($day as $nr){
        $sql .= ",$nr";
    }
    $sql .= ");";

    $result = $conn -> query($sql);
    return makeEvent($result);
}



// {
//     $conn = db_connect();

//     $sql = "SELECT * from events
//             where events.event_id in 
//             (select event_id from bookmarks where user_id = '$username');";

//     $result = $conn->query($sql);
//     return makeEvent($result);
// }

function get_AllEvents()
{
    $conn = db_connect();
    $sql = "SELECT * from events order by date_of_event ASC,time_of_event ASC";
    $result = $conn->query($sql);

    return makeEvent($result);
}

function getCreatorEvents($username)
{
    //Returns all the events which the user has created
    $conn = db_connect();

    $sql = "SELECT * from events where events.creator = '$username';";

    $result = $conn->query($sql);
    return makeEvent($result);
    
}

function get_NumberOfUserEvents()
{

    $username = $_SESSION['username'];
    $conn = db_connect();
    $sql = "SELECT * from isin where user_id = '$username'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->num_rows;
    }
}


function insert_changes($email, $name)
{
    $conn = db_connect();

    $current_User = $_SESSION['username'];
    $sql = "UPDATE user SET name='" . $name . "',email='" . $email . "' where username='" . $current_User . "'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        // echo "Error updating record: " . mysqli_error($conn);
        return false;
    }
}

function change_password($password)
{
    $conn = db_connect();

    $current_User = $_SESSION['username'];
    $sql = "UPDATE user SET password='" . $password . "' where username='" . $current_User . "'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        //echo "Error updating record: " . mysqli_error($conn);
        return false;
    }
}


function search($keyword)
{
    $conn = db_connect();
    $sql = "SELECT * from events where subject like '%" . $keyword . "%'";

    $result = $conn->query($sql);

    return makeEvent($result);

}

function makeEvent($result){
    //Given a string $result that contains event rows from an sql query, returns
    //an array of Event objects
    if ($result->num_rows > 0) {
        $events = array();
        for ($x = 0; $x < $result->num_rows; $x++) {
            $row = $result->fetch_assoc();

            //Create event object with queried row
            $event_id = $row["event_id"];
            $date = $row["date_of_event"];
            $time = $row["time_of_event"];
            $title = $row["subject"];
            $lat = $row["lat"];
            $lng = $row["lng"];
            $description = $row["description"];
            $creator = $row["creator"];
            $max_users = $row["max_users"];
            $event = new Event($event_id, $date, $time, $title, $lat,$lng,$description, $creator,$max_users);

            //Push into array of event objects
            array_push($events, $event);
        }

        return $events;
    }
}




class Event
{
    // Properties
    public $event_id, $date, $time, $title, $lat, $lng, $description, $creator, $max_users;

    function __construct($event_id, $date, $time, $title, $lat, $lng, $description,$creator, $max_users)
    {
        $this->event_id = $event_id;
        $this->date = $date;
        $this->time = $time;
        $this->title = $title;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->description = $description;
        $this->creator = $creator;
        //create max users
        $this->max_users = $max_users;
    }
    

    function get_eventid()
    {
        return $this->event_id;
    }

    function get_date()
    {
        return $this->date;
    }

    function get_time()
    {
        return $this->time;
    }


    function get_lat()
    {
        return $this->lat;
    }

    function get_lng()
    {
        return $this->lat;
    }

    function get_title()
    {
        return $this->title;
    }

    function get_description()
    {
        return $this->description;
    }   
    function get_creator()
    {
        return $this->creator;
    } 

    function get_max_users(){
        return $this->max_users;
    }
}
?>