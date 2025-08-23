<?php
include(__DIR__."/dbcon.php");
include("../service/singleUserPass.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $success = "Location: http://localhost/file_crud/read.php?msg=record updated successfull!";
    $err = "Location: http://localhost/file_crud/read.php?err=record not update failed!";
    $id = $_POST["id"];
    $title = $_POST["title"];
    
    
    $file_name = $_FILES["image"]["name"];
    $tmp_dir = $_FILES["image"]["tmp_name"];
    $current_dir = "uploads/".time()."_".$file_name;
    $row = singleUser($id);
    $oldPath = $row['thumnail'];
    if(empty($file_name)){
        $sql = "UPDATE blog SET title='$title',thumnail='$oldPath' WHERE id='$id'" ;
        
    }else{
        if(file_exists("../".$oldPath)){
            unlink("../".$oldPath);
        }
        move_uploaded_file($tmp_dir,"../".$current_dir);

        $sql = "UPDATE blog SET title='$title',thumnail='$current_dir' WHERE id='$id'" ;


    }
    echo mysqli_query($conn,$sql) ? header($success) : header($err);

}



?>