<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            height: 100px;
            width: 100px;
        }
    </style>
</head>
<body>
    
    <?php
    
    echo isset($_GET["msg"]) ? "<h1>".$_GET["msg"]."</h1>" : "";
    echo isset($_GET["err"]) ? "<h1>".$_GET["msg"]."</h1>" : "";
    
    
    ?>
    <a href="http://localhost/file_crud/create.php"><button>add record</button></a>

    <form  method="get">
        <input type="text" name="search" placeholder="search..."
        value="<?php echo isset($_GET["search"]) ? $_GET["search"] : ""?>" 

        >
        <button type="submit">search</button>
        <a href="http://localhost/file_crud/index.php"><button type="button">clear</button></a>
    </form>
    <table border="2">
        <thead>
            <th>Rno</th>
            <th>Title</th>
            <th>Thumbnail</th>
            <th>action</th>
        </thead>
        <tbody>
            <?php 
            include("./backend/dbcon.php");
            $i=1;
            if(isset($_GET["search"]) && $_GET["search"] != ""){
                $search = $_GET["search"];
                $sql = "SELECT * FROM blog WHERE title LIKE '%$search%'";
            }else{
                $sql = "SELECT * FROM blog";
            }

            $result = mysqli_query($conn,$sql);
            
            if($result && mysqli_num_rows($result) > 0){

            
            foreach($result as $row){?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row["title"]; ?></td>
                    <td>
                        <img src="<?php echo $row["thumnail"]?>" alt="" >
                    </td>
                    <td>
                    <a href="http://localhost/file_crud/backend/delete.php?id=<?php echo $row["id"]?>"><button>Del</button></a>
                    <a href="http://localhost/file_crud/create.php?id=<?php echo $row["id"]?>"><button>edit</button></a>
                    </td>

                </tr>
           <?php }
            }else{?>
            
                <h3>No record match</h3>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>