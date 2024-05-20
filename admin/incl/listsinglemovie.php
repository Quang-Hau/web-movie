<div class="header">
        <h1>Trang Quản Lí Phim Lẻ </h1>
</div>
<div class="container_list"> 

    <table class="table">
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
            <th> Edit delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
        // kết nối với sql
        require "../db/connect.php";

        
        $listed_sql = 'SELECT * FROM single_movie,movie_nation WHERE single_movie.nation=movie_nation.nation_id ORDER BY id_singlemv DESC';

        //thực thi câu lệnh
        $result = mysqli_query($conn , $listed_sql);


        // quyệt qua các phần tử trả về từ dữ liệu result và in ra
        while($row = mysqli_fetch_assoc($result )){   
        ?>
            <!-- echo $row['id'] . "-" .$row['maSv'] . "-" .$row['hoTen'] . "-" . $row['lop'] . "<br>"; -->
            <tr>
            <td ><?php echo $row['id_singlemv']; ?></td>
            <td ><img src="<?php echo $row['img_singlemv']; ?>" alt="<?php echo $row['name_singlemv']; ?>"></td>
            <td ><?php echo $row['name_singlemv']; ?></td>
            <td ><?php echo $row['name_nation']; ?></td>
            <td ><?php echo $row['publish']; ?></td>
            <td ><?php echo $row['time']; ?></td>
            <td ><?php echo $row['performer']; ?></td>
            <td title="<?php echo $row['moviedetails']; ?>" class="moviedetails"><?php echo $row['moviedetails']; ?></td>
            <td ><?php echo $row['movie_genre']; ?></td>
            <td >
            <a  href="editsinglemovie.php?id=<?php echo $row['id_singlemv']; ?>"><i class='bx_list bx bx-edit-alt'></i></a> 
            <a  onclick = "return confirm('you want to delete this line ?'); "  style="color:red;" href="deletesinglemovie.php?id=<?php echo $row['id_singlemv']; ?>" > <i class='bx_list bx bx-trash'></i></a>
            </td>
        </tr>
        <?php
        };
        ?>
    </tbody>

    </table>
</div>