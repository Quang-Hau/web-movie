

    <?php
    $messerr ='';
    $messSuccess ='';
    
if(isset($_POST['btn'])){
    require "../db/connect.php";

    $namesingle= mysqli_real_escape_string($conn, $_POST['namesingle']);
    $nation = mysqli_real_escape_string($conn, $_POST['nation']);
    $publish = mysqli_real_escape_string($conn, $_POST['publish']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $performer = mysqli_real_escape_string($conn, $_POST['performer']);
    $moviedetails = mysqli_real_escape_string($conn, $_POST['moviedetails']);
    $moviegenre = mysqli_real_escape_string($conn, $_POST['moviegenre']);
   
    $countfiles = count($_FILES['imgsingle']['name']);
   
    $imgs = '';
    for($i=0; $i<$countfiles; $i++) {
        $filename = $_FILES['imgsingle']['name'][$i];
        $filesize = $_FILES['imgsingle']['size'][$i];
        $generated_file_name = time().'-'.$filename;
    
        ##location
        $location = "uploadSingle/".$filename . $generated_file_name ;
    
        $extension = pathinfo($location,PATHINFO_EXTENSION);
        $extension = strtolower($extension);
    
        $valid_extensions = array("jpg", "jpeg", "png", "pdf", "docx");
    
        $response = 0;
    
        ##check file extension
    
        if(in_array(strtolower($extension), $valid_extensions)) {
            if(move_uploaded_file($_FILES['imgsingle']['tmp_name'][$i],$location)) {
                // echo "file name : ".$filename."<br/>";
                // $totalFileUploaded++;
                $imgs.= $location . ";";
            }
        }
        
    }
    
    $imgs = substr($imgs,0,-1);

    // video

// Xử lý dữ liệu từ form

    // Xử lý tệp video được tải lên
    $video_name = $_FILES['movieurl']['name'];
    $video_tmp = $_FILES['movieurl']['tmp_name'];
    $video_type = $_FILES['movieurl']['type'];
    

    // Đường dẫn lưu trữ tệp video trên máy chủ
    $upload_path = "uploadvideoSingle/";

    // Di chuyển tệp video vào thư mục lưu trữ
    move_uploaded_file($video_tmp, $upload_path.$video_name);

    // Đường dẫn của tệp video trong thư mục lưu trữ
    $video_url = $upload_path.$video_name;

   
       $sql = "INSERT INTO `single_movie`(`name_singlemv`,`img_singlemv`,`nation`, `publish`,`time`,`moviedetails`,`movie_genre`,`movie_url`,`performer`) VALUES('$namesingle', '$imgs', '$nation', '$publish', '$time', '$moviedetails', '$moviegenre', '$video_url','$performer')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
           echo $messSuccess = "Dữ liệu đã được thêm vào cơ sở dữ liệu.";
       } else {
           echo $messerr = "Lỗi khi thêm dữ liệu vào cơ sở dữ liệu: " . mysqli_error($conn);
       }
   
   
}

?>

<div class="container">
        <div class="content">
        <h1 class="heading">THÊM PHIM LẺ</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form_group">
                <input type="text" name="namesingle" id="namesingle" required>
                <label for="namesingle">Name Single Movie</label>
            </div>
            <div class="form_group">
                <input type="file" name="movieurl" id="movieurl" required>
                <label for="movieurl">Video Movie</label>
            </div>

            <div class="form_group">
                <label for="img" multiple class="preview">
                    <i class='bx bxs-cloud-upload'></i>
                    <span>Img Movie </span>
                </label>
                <input type="file" hidden name="imgsingle[]" id="img" required>
            </div>  
    
            <div class="form_group">    
                <select name="nation" id="nation" class="nation" required>
                    <option value="">Chọn Quốc Gia</option >
                    <?php
                    require "../db/connect.php";

                    $sqlnation = 'SELECT * FROM movie_nation ';
                    $result = mysqli_query($conn, $sqlnation);

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row['nation_id'] ?>"><?php echo $row['name_nation'] ?></option>
                        <?php
                    }
                    ?>
                </select>
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
        <h4 class="heading mess--err"> <?php echo $messerr ?> </h4>
        <h4 class="heading mess--success"> <?php echo $messSuccess ?> </h4>
        </div>

    </div>