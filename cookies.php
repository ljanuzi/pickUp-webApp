<?php 




$current_data = file_get_contents('analytics.json');
$array = json_decode($current_data,true);


$event  = $_POST['event'];
require_once('init.php');
$loggeduser= $_SESSION['username'];



$sizeOfArray = count($array);


echo $sizeOfArray;

for($x = 0 ; $x < $sizeOfArray ; $x++){
    $username =array_values($array[$x]);
    
$users = new User($username[0], $username[1]);


if($users->username == $loggeduser){

    $number =  count($users->preferences);
    $users->preferences[$number] = $event;
    $array[$x] = $users;
    break;
}

if($x == $sizeOfArray-1){

    //echo "reached end";
    $newpreferences = [$event];
    $users = new User($loggeduser,$newpreferences);
    $array[] = $users;
    break;

}

}


//$preferences[] = $event;

//$user =  new User($loggeduser,$preferences);


// $array[] = $users;
$final_data = json_encode($array);
file_put_contents('analytics.json',$final_data);







class User
{
    // Properties
    public $username,$preferences;

    function __construct(string $username,array $preferences)
    {
        $this->username = $username;
        $this->preferences = $preferences;

    }
    

    function getUsername(){
        return $this->username;
    }

    function getPreferences(){
        return $this->preferences;
    }
}

?>
