<div id="header">
    <div class="box-logo">
        <a href="#" class="logo">PHIM MOI<span>
                .NET</span></a>
    </div>
    <div class="box-logo">
        <h3> welcome <span><?php echo $_SESSION['username']; ?></span></h3>
    </div>
    <ul id="nav">
        <li>
            <a href="#">
                POSTER
                <i class='bx_nav bx bx-chevron-right'></i>
            </a>
            <ul class="subnav">
                <li><a href="index-admin.php?movie=addposter">THÊM POSTER</a></li>
                <li><a href="index-admin.php?movie=listposter">QUẢN LÍ POSTER </a></li>
            </ul>
        </li>

        <li>
            <a href="#">
                PHIM MỚI
                <i class='bx_nav bx bx-chevron-right'></i>
            </a>
            <ul class="subnav">
                <li><a href="index-admin.php?movie=addnewmv">THÊM PHIM MỚI</a></li>
                <li><a href="index-admin.php?movie=listnewmovie">QUẢN LÍ PHIM MỚI</a></li>
            </ul>
        </li>

        <li>
            <a href="#">
                PHIM LẺ
                <i class='bx_nav bx bx-chevron-right'></i>
            </a>
            <ul class="subnav">
                <li><a href="index-admin.php?movie=addsinglemv">THÊM PHIM LẺ</a></li>
                <li><a href="index-admin.php?movie=listsinglemovie">QUẢN LÍ PHIM LẺ</a></li>
            </ul>
        </li>

        <li>
            <a href="#">
                PHIM BỘ
                <i class='bx_nav bx bx-chevron-right'></i>
            </a>
            <ul class="subnav">
                <li><a href="index-admin.php?movie=addseriesmv">THÊM PHIM BỘ</a></li>
                <li><a href="#">QUẢN LÍ PHIM BỘ</a></li>
            </ul>
        </li>

        <li>
            <a href="#">
                QUỐC GIA
                <i class='bx_nav bx bx-chevron-right'></i>
            </a>
            <ul class="subnav">
                <li><a href="index-admin.php?movie=addnation"> THÊM QUỐC GIA</a></li>
                <li><a href="index-admin.php?movie=listnation">QUẢN LÍ QUỐC GIA</a></li>
            </ul>
        </li>


        <li>
            <a href="logout.php">
                ĐĂNG XUẤT
                <i class='bx_nav bx bx-log-out'></i>
            </a>
        </li>
    </ul>

</div>