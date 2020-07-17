<!-- file used in index to upload poster LJ01 -->
<?php

if(isset($_FILES['file'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"uploads/".$file_name);
       echo "Success";
    }else{
       print_r($errors);
    }
 }

    // if(isset($_POST['submit'])){

    //     $file = $_FILES['picfile'];

    //     $fileName = $_FILES['file']['name'];
    //     $fileTmpName = $_FILES['file']['tmp_name'];
    //     $fileSize = $_FILES['file']['size'];
    //     $fileError = $_FILES['file']['error'];
    //     $fileType = $_FILES['file']['type'];

    //     $fileExt = explode(".", $fileName);
    //     $fileActualExt = end(strtolower($fileExt));

    //     $allowed = array('jpg', 'jpeg', 'png', 'gif');

    //     // check if it is a 'pic'
    //     if(in_array($fileActualExt, $allowed)){

    //         //check if there afre no errors while uploadig
    //         if($fileError === 0){

    //             //size issues check
    //             if ($fileSize < 1000000) {
                    
    //                 //change the original name to avoid complications
    //                 $fileNameNew = uniqid('', true) . "." . $fileActualExt;

    //                 $fileDestination = 'uploads/' . $fileNameNew;

    //                 move_uploaded_file($fileTmpName, $fileDestination);

    //                 header('Location: index.php?uploadsuccess');

                    
    //             }
    //             else
    //               echo "This file is to big";

    //         } 
    //         else{
    //         echo "Error occured while uploading the file!";
    //         }
    //     }
    //     else{
    //         echo "Files of this type, cannot be uploaded!";
    //     }
    // }
    echo '<script>location.replace("landing.php");</script>';
?>