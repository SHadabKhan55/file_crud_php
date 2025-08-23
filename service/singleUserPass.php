<?php
include(__DIR__."/../backend/dbcon.php");

function singleUser($id=null){
    global $conn;
    $sql = "SELECT * FROM blog WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;



}


?>