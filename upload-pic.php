<?php

$title = $_POST['title'];
// Decode base64 data
list($type, $data) = explode(';', $_POST['file']);
list(, $data) = explode(',', $data);
$file_data = base64_decode($data);

// Get file mime type
$finfo = finfo_open();
$file_mime_type = finfo_buffer($finfo, $file_data, FILEINFO_MIME_TYPE);

if($file_mime_type == 'image/jpeg' || $file_mime_type == 'image/jpg')
	$file_type = 'jpeg';
else if($file_mime_type == 'image/png')
	$file_type = 'png';
else if($file_mime_type == 'image/gif')
	$file_type = 'gif';
else 
	$file_type = 'other';

if(in_array($file_type, [ 'jpeg', 'png', 'gif' ])) {
    require_once("authenticate.php");
    $file_name = get_username() . '.' . 'jpg';
    file_put_contents('images/'.$file_name.'', $file_data);

    echo 'images/'.$file_name.'';
    
}
else {
	echo 'Error : Only JPEG, PNG & GIF allowed';
}


?>
