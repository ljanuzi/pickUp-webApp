<?php 

    $title  = $_POST['title'];
   
    //IDK why this is named budget, TODO: reconsider changing name
    $location= $_POST['budget'];
    $max_users = $_POST['max_users'];
    $date = $_POST['date'];

    $time = $_POST['time'];
    $lat = 0; 
    $lng = 0;
    $description = $_POST['eventDescription'];
    $id = uniqid();
    // $date =  str_replace("/","-",$date);


    $date1=date_create($date);
    $l = date_format($date1,"Y/m/d");

    

     $datefinal =  str_replace("/","-",$l);
 
     //echo $datefinal;
    

    //used in index to upload poster LJ01 
    //var_dump($_FILES['picfile']['name']);
    // if(isset($_FILES['file'])){
        $errors= array();
        $file_name = $_FILES['picfile']['name'];
        $fileTmpName = (explode('.', $file_name));
        $file_size =$_FILES['picfile']['size'];
        $file_tmp =$_FILES['picfile']['tmp_name'];
        $file_type=$_FILES['picfile']['type'];

        $file_ext = strtolower(end($fileTmpName));

        //lets you upload the same file may times
        $fileNameNew = $id . "." . "jpg";
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 5000000){
            $errors[]='File size is too big';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"uploads/".$fileNameNew );
           //echo "Successfully uploaded";
        }else{
           print_r($errors);
        }
    // }


     require_once('query_auth.php');

     //If user selected a static location, here are their LatLngs
     if($location == 'Sofou Building'){
        $lat = 40.637350;
        $lng = 22.936904;
     }else
      if($location == 'Warehouse'){
         $lat= 40.634825;
         $lng= 22.93428;
      }else if($location == 'YMCA'){
         $lat= 40.626573;
         $lng= 22.951844;
      }else{
         //If they input their location through map, lat/lng get decided by the location input
         $latlng = explode(",",$location);
         $lat = (float)$latlng[0];
         $lng = (float)$latlng[1];
      }

  
     insert_event($id,$datefinal,$time,$title,$lat,$lng,$description,$max_users);
     
     


    echo '<script>location.replace("landing.php");</script>';

?>