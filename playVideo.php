<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web movie</title>
    <link rel="icon" href="./img/icon/camera-2008489_640.webp">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="playVideo.css">
</head>

<body class="">
    <?php
    include "./inc/header.php";
    ?>
    <?php
    $movieId = $_GET['id'];

    require "./db/connect.php";

    $movieSql = "SELECT * FROM newmovie,movie_nation WHERE newmovie.nation=movie_nation.nation_id AND id_movie ='$movieId'";

    $result = mysqli_query($conn, $movieSql);

    while ($row = mysqli_fetch_assoc($result)) {

    ?>

        <div class="movie container">
            <div class="play_movie">
                <video class="video" width="1200" height="630" controls>
                    <source src="<?php echo "admin/" . $row['movie_url'] ?>" alt="<?php echo $row['name_poster']; ?>" type="video/mp4">
                </video>
            </div>

            <div class="heading">
                <h2 class="heading-title">
                    INFO
                </h2>
            </div>

            <div class="movie_info">
                <img src="<?php echo "admin/" . $row['img_movie'] ?>" alt="<?php echo $row['movie_name']; ?>" class="poster_img">

            </div>
            <div class="movie_body">
                <div class="movie_body--heading">
                    <h1><?php echo $row['movie_name']; ?></h1>
                    <div class="home-info">
                        <p> <?php echo $row['movie_genre']; ?> | </p>
                        <p> <?php echo $row['name_nation']; ?> | </p>
                        <p> <?php echo $row['publish']; ?> | </p>
                        <p> <?php echo $row['time']; ?> phút </p>
                    </div>

                    <div class="moviedetails">
                        <div class="moviedetails_heading">
                            <h3>Diễn viên</h3>
                        </div>

                        <div class="moviedetails_body">
                            <span></span>
                            <p><?php echo $row['performer']; ?> ,... </p>
                        </div>
                    </div>

                    <div class="moviedetails">
                        <div class="moviedetails_heading">
                            <h3>Tóm tắt</h3>
                        </div>

                        <div class="moviedetails_body">
                            <span><?php echo $row['movie_name']; ?></span>
                            <p><?php echo $row['moviedetails']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="share_social">
                    <a href="#" class="social-link"><i class='bx bx-share-alt'></i></a>
                    <a href="#" class="social-link"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="social-link"><i class='bx bxl-twitter'></i></a>
                    <a href="#" class="social-link"><i class='bx bxl-youtube'></i></a>
                    <a href="#" class="social-link"><i class='bx bxl-instagram-alt'></i></a>
                </div>
            </div>
        <?php  } ?>



        <?php
        include "./inc/new-movie.php";
        include "./inc/footer.php";
        ?>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="main.js"></script>
</body>
<script src="dark.js"></script>

</html>