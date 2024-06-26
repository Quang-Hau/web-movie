<?php

require "../db/connect.php";

$id = $_GET['id'];

$sql = "SELECT * FROM single_movie WHERE id_singlemv = $id";

$result = mysqli_query($conn, $sql);

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
    while ($row = mysqli_fetch_assoc($result)) {

    ?>
        <div class="container">
            <div class="content">
                <h1 class="heading">SỬA PHIM MỚI </h1>
                <form action="updatesinglemovie.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id_singlemv']; ?>">
                    <div class="form_group">
                        <input type="text" name="namesingle" id="namesingle" required value="<?php echo $row['name_singlemv'] ?>">
                        <label for="namesingle">Name Single Movie </label>
                    </div>
                    <div class="form_group">
                        <input type="file" name="movieurl" id="movieurl" value="<?php echo $row['movie_url'] ?>">
                        <label for="movieurl">Video Movie</label>
                    </div>

                    <div class="form_group">
                        <label for="img" multiple class="preview">
                            <i class='bx bxs-cloud-upload'></i>
                            <span>Img Movier </span>
                            <img src="<?php echo $row['img_singlemv'] ?>" alt="">
                        </label>
                        <input type="file" hidden name="imgsingle[]" id="img" required>
                        <span class="showErrorImg"> </span>
                    </div>


                    <div class="form_group">
                        <select name="nation" id="nation" required class="nation">
                            <option value="">Chọn Quốc Gia</option>
                            <?php
                            require "../db/connect.php";

                            $sqlnation = 'SELECT * FROM movie_nation ';
                            $result2 = mysqli_query($conn, $sqlnation);

                            while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                                <option value="<?php echo $row2['nation_id'] ?>"><?php echo $row2['name_nation'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form_group">
                        <input type="date" name="publish" id="publish" value="<?php echo $row['publish'] ?>">
                        <label for="publish">Ngày Tháng Năm Sản Xuất</label>
                    </div>
                    <div class="form_group">

                        <input type="text" name="time" id="time" required value="<?php echo $row['time'] ?>">
                        <label for="time">Thời Lượng</label>
                    </div>

                    <div class="form_group">
                        <input type="text" name="performer" id="performer" required value="<?php echo $row['performer'] ?>">
                        <label for="performer">Diễn Viên</label>
                    </div>

                    <div class="form_group">
                        <input type="text" name="moviedetails" id="moviedetails" required value="<?php echo $row['moviedetails'] ?>">
                        <label for="moviedetails">Chi Tiết Phim</label>
                    </div>
                    <div class="form_group">

                        <input type="text" name="moviegenre" id="moviegenre" required value="<?php echo $row['movie_genre'] ?>">
                        <label for="moviegenre">Thể Loại Phim</label>
                    </div>

                    <button class="btn" type="submit" name="btn">UPDATE</button>
                </form>
            </div>

        </div>
    <?php  } ?>
</body>
<script src="app.js"></script>

</html>