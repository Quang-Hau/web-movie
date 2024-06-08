<div class="header" id="header">
    <div class="nav container">
        <!-- logo -->
        <a href="index.php?movie=index.php" class="logo">PHIM MOI <span>.NET</span></a>
        <!-- tìm kiếm -->
        <div class="search-box">
            <form class="form-search" action="search.php" method="POST">
                <input type="search" name="search" id="search-input" placeholder="Tìm kiếm phim">
                <button class="btn-search" type="submit"><i class="bx bx-search bx-search"></i></button>
            </form>
        </div>

        <div class="dark-btn">
            <input type="checkbox" id="dark-mode" class="dark-mode" hidden>
            <label for="dark-mode"></label>
        </div>

    </div>
    <!-- navbar -->
    <div class="navbar" id="navbar">
        <a href="index.php?movie=index.php" class="nav-link">
            <i class="bx bx-home"></i>
            <span class="nav-link-title ">Home</span>
        </a>
        <a href="index.php?movie=new-movie" class="nav-link ">
            <i class='bx bx-video'></i>
            <span class="nav-link-title">Phim Mới</span>
        </a>
        <a href="index.php?movie=single-movie" class="nav-link ">
            <i class='bx bx-movie-play'></i>
            <span class="nav-link-title">Phim Lẻ</span>
        </a>
        <a href="index.php?movie=series-movie" class="nav-link ">
            <i class='bx bxs-camera-movie'></i>
            <span class="nav-link-title">Phim Bộ</span>
        </a>
    </div>
</div>