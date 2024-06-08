
<?php
$messerr = '';
$messSucess = '';
if(isset($_POST['btn'])){
    require "../db/connect.php";

    //  mysqli_real_escape_string không bị lỗi thi thêm text có kí tự đặt biệt
    $name = mysqli_real_escape_string($conn, $_POST['nameposter']);
    $nation = mysqli_real_escape_string($conn, $_POST['nation']);
    $publish = mysqli_real_escape_string($conn, $_POST['publish']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $performer = mysqli_real_escape_string($conn, $_POST['performer']);
    $moviedetails = mysqli_real_escape_string($conn, $_POST['moviedetails']);
    $moviegenre = mysqli_real_escape_string($conn, $_POST['moviegenre']);
    $slogan = mysqli_real_escape_string($conn, $_POST['slogan']);
   
    $countfiles = count($_FILES['imgposter']['name']);
   
    $imgs = '';
    
    for($i=0; $i<$countfiles; $i++) {
        $filename = $_FILES['imgposter']['name'][$i];
        $filesize = $_FILES['imgposter']['size'][$i];
        $generated_file_name = time().'-'.$filename;
    
        
        $location = "uploadPoster/".$filename . $generated_file_name ;
        
        //lấy phần mwor rộng đường dẫn của tệp
        $extension = pathinfo($location,PATHINFO_EXTENSION);
        $extension = strtolower($extension);
    
        $valid_extensions = array("jpg", "jpeg", "png", "pdf", "docx");
    
        $response = 0;

    
        if(in_array(strtolower($extension), $valid_extensions)) {
            if(move_uploaded_file($_FILES['imgposter']['tmp_name'][$i],$location)) {

                $imgs.= $location . ";";
            }
        }
        
    }
    
    $imgs = substr($imgs,0,-1);

    // video


    // Xử lý tệp video được tải lên
    $video_name = $_FILES['postermvurl']['name'];
    $video_tmp = $_FILES['postermvurl']['tmp_name'];
    $video_type = $_FILES['postermvurl']['type'];
    

    $upload_path = "uploadvideoPoster/";

    // Di chuyển tệp video vào thư mục lưu trữ
    move_uploaded_file($video_tmp, $upload_path.$video_name);

    // Đường dẫn của tệp video trong thư mục lưu trữ
    $video_url = $upload_path.$video_name;

    
    $sql = "INSERT INTO `poster_movie`(`poster_img`,`name_poster`,`nation`, `publish`,`time`,`performer`,`moviedetails`,`movie_genre`,`slogan`,`poster_vdurl`) VALUES('$imgs', '$name', '$nation', '$publish', '$time', '$performer', '$moviedetails', '$moviegenre', '$slogan', '$video_url')";
    $result = mysqli_query($conn, $sql);
   
}
?>


<div class="container">
        <div class="content">
        <h1 class="heading">THÊM POSTER </h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form_group">
                <input type="text" name="nameposter" id="nameposter" required>
                <label for="nameposter">Name Poster </label>
                
                <span class="showErrorName"> tesst</span>
            </div>
            <div class="form_group">
                <input type="file" name="postermvurl" id="postermvurl" required>
                <label for="postermvurl">Video Poster</label>
            </div>

            <div class="form_group">
                <label for="img" multiple class="preview">
                    <i class='bx bxs-cloud-upload'></i>
                    <span>Img Poster </span>
                </label>
                <input type="file" hidden name="imgposter[]" id="img" required>
                <span class="showErrorImg"> </span>
            </div>
    
            <div class="form_group">    
                <select name="nation" id="nation" required  class="nation">
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
            <div class="form_group">
    
            <input type="text" name="slogan" id="slogan" required>
            <label for="slogan">Slogan</label>
            </div>

            <button class="btn" type="submit" name="btn">submit</button>
        </form>
        <h4 class="heading mess--err"> <?php echo $messerr ?> </h4>
        <h4 class="heading mess--success"> <?php echo $messSucess ?> </h4>
                    
        </div>

    </div>
