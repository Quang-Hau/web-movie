<div class="container_list"> 

<table  class="table">
    <thead class="table_heading">
        <tr>
            <th>ID</th>
            <th>NAME NATION</th>
            <th> ID QUỐC GIA </th>
        </tr>
    </thead>
    <tbody>

        <?php
        // kết nối với sql
        require "../db/connect.php";

       
        $listed_sql = 'SELECT * FROM movie_nation';

        //thực thi câu lệnh
        $result = mysqli_query($conn , $listed_sql);


        // quyệt qua các phần tử trả về từ dữ liệu result và in ra
        while($row = mysqli_fetch_assoc($result )){   
        ?>
            <tr>
            <td ><?php echo $row['id_nation']; ?></td>
            <td ><?php echo $row['name_nation']; ?></td>
            <td ><?php echo $row['nation_id']; ?></td>
            <td >
            <a  href="editnation.php?id=<?php echo $row['id_nation']; ?>"><i class='bx_list bx bx-edit-alt'></i></a> 
            <a  onclick = "return confirm('you want to delete this line ?'); "  style="color:red;" href="deletenation.php?id=<?php echo $row['id_nation']; ?>" > <i class='bx_list bx bx-trash'></i></a>
            </td>
        </tr>
        <?php
        };
        ?>
    </tbody>

</table>
</div>