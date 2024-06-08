<div class="container">
    <div class="content">
        <h1 class="heading">THÊM PHIM Bộ</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form_group">
                <input type="text" name="namemovie" id="namemovie" required>
                <label for="namemovie">Name Movie</label>
            </div>
            <div class="form_group">
                <input type="file" name="movieurl" id="movieurl" required>
                <label for="movieurl">Video Movie</label>
            </div>
            <div class="form_group">
                <input type="file" name="imgmovie" id="imgmovie" required>
                <label for="imgmovie">Img Movie</label>
            </div>

            <div class="form_group">
                <input type="number" name="nation" id="nation" required>
                <label for="nation">Quốc Gia</label>
            </div>

            <div class="form_group">
                <input type="date" name="publish" id="publish" required>
                <label for="publish">Ngày Tháng Năm Sản Xuất</label>
            </div>
            <div class="form_group">

                <input type="text" name="time" id="time" required>
                <label for="time">Thời Lượng</label>
            </div>

            <div class="form_group">
                <input type="text" name="performer" id="performer" required>
                <label for="performer">Diễn Viên</label>
            </div>

            <div class="form_group">
                <input type="text" name="moviedetails" id="moviedetails" required>
                <label for="moviedetails">Chi Tiết Phim</label>
            </div>
            <div class="form_group">

                <input type="text" name="moviegenre" id="moviegenre" required>
                <label for="moviegenre">Thể Loại Phim</label>
            </div>

            <button class="btn " type="submit" name="btn">submit</button>
        </form>

    </div>

</div>