<?php

include("./dbcon.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $title = $_POST["title"];
    
    $file_name = $_FILES["image"]["name"];
    $tmp_dir = $_FILES["image"]["tmp_name"];
    $current_dir = "uploads/".time()."_".$file_name;

    if(!is_dir("../uploads")){
        mkdir("../uploads",0777,true);
    }

    if(move_uploaded_file($tmp_dir,"../".$current_dir)){
        $success = "Location: http://localhost/file_crud/index.php?msg=record create successfull!";
        $err = "Location: http://localhost/file_crud/index.php?err=record not create failed!";
        $sql = "INSERT INTO blog(title,thumnail) VALUES ('$title','$current_dir')";

        echo mysqli_query($conn,$sql) ? header($success) : header($err);
    }





}


?>