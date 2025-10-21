<?php

// include("./dbcon.php");
include("../service/singleUserPass.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $row = singleUser($id);
    $file_address = $row["thumnail"];

   

    if(file_exists("../".$file_address)){        
        if(unlink("../".$file_address)){
            
        $success = "Location: http://localhost/file_crud/index.php?msg=record delete successfull!";
        $err = "Location: http://localhost/file_crud/index.php?err=record not delete failed!";
        $sql = "DELETE FROM blog WHERE id='$id'";
        echo mysqli_query($conn,$sql) ? header($success) : header($err);

        }


    
    }


}


?>