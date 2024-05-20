<div class="header">
<h1>Trang Quản Lí Poster </h1>
</div>
<div class="container_list"> 


    <table  class="table">
        <thead class="table_heading">
            <tr>
                <th>ID</th>
                <th>Poster Phim</th>
                <th> Tên Phim </th>
                <th> Tên Quốc gia </th>
                <th> Ngày sản Xuất </th>
                <th> Thời lượng </th>
                <th> Tên diễn viên </th>
                <th> Chi tiết phim </th>
                <th> Thể loại </th>
                <th> Slogan </th>
                <th> Edit delete</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // kết nối với sql
            require "../db/connect.php";

        
            $listed_sql = 'SELECT * FROM poster_movie,movie_nation WHERE poster_movie.nation=movie_nation.nation_id ORDER BY poster_id DESC ';

            //thực thi câu lệnh
            $result = mysqli_query($conn , $listed_sql);


            // quyệt qua các phần tử trả về từ dữ liệu result và in ra
            while($row = mysqli_fetch_assoc($result )){   
            ?>
                <tr>
                <td ><?php echo $row['poster_id']; ?></td>
                <td ><img src="<?php echo $row['poster_img']; ?>" alt="<?php echo $row['name_poster']; ?>"></td>
                <td ><?php echo $row['name_poster']; ?></td>
                <td ><?php echo $row['name_nation']; ?></td>
                <td ><?php echo $row['publish']; ?></td>
                <td ><?php echo $row['time']; ?></td>
                <td ><?php echo $row['performer']; ?></td>
                <td title="<?php echo $row['moviedetails']; ?>" class="moviedetails"><?php echo $row['moviedetails']; ?></td>
                <td ><?php echo $row['movie_genre']; ?></td>
                <td ><?php echo $row['slogan']; ?></td>
                <td >
                <a  href="editposter.php?id=<?php echo $row['poster_id']; ?>"><i class='bx_list bx bx-edit-alt'></i></a> 
                <a  onclick = "return confirm('you want to delete this line ?'); "  style="color:red;" href="deleteposter.php?id=<?php echo $row['poster_id']; ?>" > <i class='bx_list bx bx-trash'></i></a>
                </td>
            </tr>
            <?php
            };
            ?>
        </tbody>

    </table>
</div>