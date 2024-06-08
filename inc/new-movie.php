<section class="movies container" id="movies">
    <div class="heading">
        <h2 class="heading-title">
            PHIM MỚI
        </h2>
    </div>
    <div class="movies-content">
        <?php
        require "./db/connect.php";


        $sql_newMovie = 'SELECT * FROM newmovie,movie_nation WHERE newmovie.nation=movie_nation.nation_id  ORDER BY id_movie ASC';

        $result = mysqli_query($conn, $sql_newMovie);

        if (mysqli_num_rows($result) > 0) {
            while ($row_newmovie = mysqli_fetch_assoc($result)) {
        ?>
                <div class="movie-box">
                    <img src="<?php echo "admin/" . $row_newmovie['img_movie'] ?>" alt="<?php echo $row_newmovie['movie_name']; ?>" class="movie-box-img">
                    <div class="box-text">
                        <h2 class="movie-title">
                            <?php echo $row_newmovie['movie_name']; ?>
                        </h2>
                        <span class="movie-type"><?php echo $row_newmovie['movie_genre']; ?></span>
                        <span class="movie-type"><?php echo $row_newmovie['name_nation']; ?></span>
                        <a href="playVideo.php?id=<?php echo $row_newmovie['id_movie']; ?>" class="watch-btn play-btn">
                            <i class='bx bx-play'></i>
                        </a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo 'Không có dữ liệu phim mới.';
        }
        ?>
    </div>
</section>