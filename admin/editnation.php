<?php

require "../db/connect.php";

$id = $_GET['id'];

$sql = "SELECT * FROM movie_nation WHERE id_nation = $id";

$result = mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web movie</title>
    <link rel="icon" href="./img/icon/camera-2008489_640.webp">
    <link rel="stylesheet" href="admin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <?php
        while ($row = mysqli_fetch_assoc($result)){

    ?>
<div class="container">
        <div class="content">
        <h1 class="heading">SỬA QUỐC GIA </h1>
        <form action="updatenation.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id_nation'];?>">
            <div class="form_group">
                <input type="text" name="namenation" id="namenation" required value="<?php echo $row['name_nation']?>">
                <label for="namenation">Tên Quốc Gia </label>
            </div>
            <div class="form_group">
                <input type="number" name="nationid" id="nationid"  value="<?php echo $row['nation_id']?>">
                <label for="nationid">ID Quốc Gia</label>
            </div>   
            <button class="btn" type="submit" name="btn">UPDATE</button>
        </form>  
                  
        </div>

    </div>
<?php  } ?>
    </body>
</html>

