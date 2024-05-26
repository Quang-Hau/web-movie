<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web movie</title>
    <link rel="icon" href="./img/icon/camera-2008489_640.webp">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./owl/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./owl/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="responsive.css">
</head>
<body class="dark">
<?php 

    include "./inc/header.php";
    include "./inc/poster.php";
?>
<section class="movies container" id="movies">
    <div class="heading">
        <h2 class="heading-title">
            search 
        </h2>
    </div>
    <div class="movies-content">
    <?php

$valueSearch = isset($_POST['search']) ? $_POST['search'] : '';

if (!empty($valueSearch)) {
    $sql = "SELECT * FROM newmovie,movie_nation WHERE newmovie.nation=movie_nation.nation_id AND movie_name LIKE '%$valueSearch%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row_newmovie = mysqli_fetch_assoc($result)) {
            ?>
            <div class="movie-box">
                <img src="<?php echo "admin/".$row_newmovie['img_movie'] ?>" alt="<?php echo $row_newmovie['movie_name']; ?>"  class="movie-box-img">
                <div class="box-text">
                    <h2 class="movie-title">
                        <?php echo $row_newmovie['movie_name']; ?>
                    </h2>
                    <span class="movie-type"><?php echo $row_newmovie['movie_genre']; ?></span>
                    <span class="movie-type"><?php echo $row_newmovie['name_nation']; ?></span>
                    <a href="playVideo.php?id=<?php echo$row_newmovie['id_movie']; ?>" class="watch-btn play-btn">
                        <i class='bx bx-play'></i>
                    </a>
                </div>
            </div>
            <?php
        }
    } else {
        echo 'Không có dữ liệu tìm kiếm.';
    }
} 
?>
    </div>
</section>

<section class="movies container" >
    <div class="heading">
        <h2 class="heading-title">
        </h2>
    </div>
    <div class="movies-content">
        <?php
        require "./db/connect.php";
        $valueSearch = isset($_POST['search']) ? $_POST['search'] : '';

    if (!empty($valueSearch)) {
        $sql_single_movie = "SELECT * FROM single_movie,movie_nation WHERE single_movie.nation=movie_nation.nation_id AND name_singlemv LIKE '%$valueSearch%' ";

        $result = mysqli_query($conn, $sql_single_movie);

        if (mysqli_num_rows($result) > 0) {
            while ($row_single_movie = mysqli_fetch_assoc($result)) {
        ?>
                <div class="movie-box">
                    <img src="<?php echo "admin/".$row_single_movie['img_singlemv'] ?>" alt="<?php echo $row_single_movie['name_singlemv']; ?>" class="movie-box-img">
                    <div class="box-text">
                        <h2 class="movie-title">
                            <?php echo $row_single_movie['name_singlemv']; ?>
                        </h2>
                        <span class="movie-type"><?php echo $row_single_movie['movie_genre']; ?></span>
                        <span class="movie-type"><?php echo $row_single_movie['name_nation']; ?></span>
                        <a href="playVideosingle.php?id=<?php echo$row_single_movie['id_singlemv']; ?>" class="watch-btn play-btn">
                            <i class='bx bx-play'></i>
                        </a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo 'Không có dữ liệu tìm kiếm.';
        }
    }        
        ?>
    </div>
</section>

      
<?php
    include "./inc/footer.php";
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./owl/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
        $(".owl-carousel").owlCarousel();
        });
                $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            autoplayTimeout:5000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
</body>
<script src="dark.js"></script>
</html>