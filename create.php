<?php
include "./service/singleUserPass.php";
$id = $_GET["id"] ?? null;
$add = "http://localhost/file_crud/backend/create.php";
$edit = "http://localhost/file_crud/backend/edit.php";
$row = singleUser($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        img{
            height: 200px;
            width: 150px;
            border-radius: 50%;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h2><?php echo $id ? "Edit blog" : "Add blog"?></h2>
    <form action="<?php echo $id ? $edit : $add?>" method="post" enctype="multipart/form-data">
        <?php if($id && !empty($row['thumnail'])){?>
            <img src="<?php echo $row['thumnail']?>" alt=""><br>
        <?php }  ?>
         
        <input type="hidden" name="id" value="<?php echo $id ? $row["id"] : ""?>"><br>
        <label for="">title</label><br>
        <input type="text" name="title" value="<?php echo $id ? $row["title"] : ""?>"><br>
        <label for="">thumnail</label><br>
        <input type="file" name="image" id=""><br>
        <button type="submit">save</button>
    </form>
</body>
</html>