
<?php

function getPopularEvents(){


$current_data = file_get_contents('analytics.json');
$array = json_decode($current_data,true);


$sizeOfArray = count($array);

for($x = 0 ; $x < $sizeOfArray ; $x++){
    $username =array_values($array[$x]);
    
$users = new User($username[0], $username[1]);

$usersCount[] = array_count_values($users->preferences);


}
return $usersCount;

}





function bestEvents(){

@$count = getPopularEvents();

error_reporting(E_ERROR | E_PARSE);

for($x=0;$x<count($count);$x++){
    $java = $count[$x];
    $thekeys = array_keys($java);

$most_used = $thekeys[count($thekeys)-1];
$second_mostUsed = $thekeys[count($thekeys)-2];


$most_usedClicks = $java[$most_used];
$second_mostUsedClicks = $java[$second_mostUsed];


//echo $most_usedClicks;
//echo $second_mostUsedClicks;



$event = new bestEvent($most_used,$most_usedClicks);
$event2 = new bestEvent($second_mostUsed,$second_mostUsedClicks);

//print_r($event);


//echo "------";

//print_r($event2);



$preferences[]= $event;
$preferences[] = $event2;

}


return $preferences;


}


class bestEvent{

    public $name,$clicks;

    function __construct( $name, $clicks)
    {
        $this->name = $name;
        $this->clicks = $clicks;

    }
    

    function getName(){
        return $this->name;
    }

    function getClicks(){
        return $this->clicks;
    }

}






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