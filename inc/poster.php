<!-- home-->
<section class="  owl-carousel owl-theme container" id="home">
<?php
    require "./db/connect.php";

    $sql_poster  = 'SELECT * FROM poster_movie,movie_nation WHERE poster_movie.nation=movie_nation.nation_id  ';

    $result = mysqli_query($conn, $sql_poster );

    if (mysqli_num_rows($result) > 0) { 
        while ($row_poster  = mysqli_fetch_assoc($result)) {
            $img_arr = explode(';',  $row_poster['poster_img']);
?>    
       <div class=" home poster_slider"> 
            <img  src="<?php echo "admin/".$row_poster['poster_img'] ?>" alt="<?php echo $row_poster['name_poster']; ?>" class="home-img">
            <div class="home-text">
        
                <h1 class="home-title">
                <?php echo $row_poster['name_poster'] ?>
                </h1>  
                <h1 class="home-title">
                <?php  echo $row_poster['slogan']; ?>
                </h1>
                <p><?php  echo $row_poster['moviedetails']; ?></p><a href="playVideoposter.php?id=<?php echo $row_poster['poster_id']; ?>">xem thêm...</a>
                <div class="home-info">
                    <p><?php echo $row_poster['movie_genre'] ;?> | </p>
                    <p><?php echo $row_poster['name_nation'] ;?> | </p>
                    <p><?php echo $row_poster['publish'] ;?> | </p>
                    <p><?php echo $row_poster['time'] ;?> phút</p>
                </div>
                <a href="playVideoposter.php?id=<?php echo $row_poster['poster_id']; ?>" class="watch-btn">
                    <i class='bx bx-play'></i><span>Xem phim</span>
                </a>
            </div> 
    </div>
    <?php
            }
        } else {
            echo 'Không có dữ liệu phim mới.';
        }
        ?>   
</section>

<!-- <img src="img/poster/special-poster-2-mai-17084211313531000860296.webp" alt="poster" class="home-img"> -->