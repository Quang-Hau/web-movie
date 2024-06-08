<section class="movies container" id="movies">
    <div class="heading">
        <h2 class="heading-title">
            PHIM LẺ
        </h2>
    </div>
    <div class="movies-content">
        <?php
        require "./db/connect.php";

        $sql_single_movie = 'SELECT * FROM single_movie,movie_nation WHERE single_movie.nation=movie_nation.nation_id  ORDER BY id_singlemv ASC';

        $result = mysqli_query($conn, $sql_single_movie);

        if (mysqli_num_rows($result) > 0) {
            while ($row_single_movie = mysqli_fetch_assoc($result)) {
        ?>
                <div class="movie-box">
                    <img src="<?php echo "admin/" . $row_single_movie['img_singlemv'] ?>" alt="<?php echo $row_single_movie['name_singlemv']; ?>" class="movie-box-img">
                    <div class="box-text">
                        <h2 class="movie-title">
                            <?php echo $row_single_movie['name_singlemv']; ?>
                        </h2>
                        <span class="movie-type"><?php echo $row_single_movie['movie_genre']; ?></span>
                        <span class="movie-type"><?php echo $row_single_movie['name_nation']; ?></span>
                        <a href="playVideosingle.php?id=<?php echo $row_single_movie['id_singlemv']; ?>" class="watch-btn play-btn">
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