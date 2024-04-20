<?php

require "../db/connect.php";


    
    $updateid = $_POST['id'];
    
    $sql_img = "SELECT * FROM poster_movie WHERE poster_id = $updateid";

    $result1 = mysqli_query($conn,$sql_img);

    $row = mysqli_fetch_assoc($result1);
    
    $name = $_POST['nameposter'];
    $nation = $_POST['nation'];
    $publish = $_POST['publish'];
    $time = $_POST['time'];
    $performer = $_POST['performer'];
    $moviedetails = $_POST['moviedetails'];
    $moviegenre = $_POST['moviegenre'];
    $slogan = $_POST['slogan'];
    
    //kiểm tra xem có ảnh mưới được chonn hay không
    
    $uploadimg = !empty($_FILES['imgposter']['name'][0]);
    $uploavideo = !empty($_FILES['postermvurl']['name']);
    
    // xử lí nếu có ảnh mới được chọn

    if($uploadimg){
        unlink($row['poster_img']);

    }
    
    if($uploadimg){
        $countfiles = count($_FILES['imgposter']['name']);
       
        $imgs = '';
        
        for($i=0; $i<$countfiles; $i++) {
            $filename = $_FILES['imgposter']['name'][$i];
            $filesize = $_FILES['imgposter']['size'][$i];
            $generated_file_name = time().'-'.$filename;
        
            
            $location = "uploadPoster/".$filename . $generated_file_name ;
        
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
    }
    
    if($uploavideo){
            unlink($row['poster_vdurl']);
           // Xử lý tệp video được tải lên
           $video_name = $_FILES['postermvurl']['name'];
           $video_tmp = $_FILES['postermvurl']['tmp_name'];
           $video_type = $_FILES['postermvurl']['type'];
           
       
           // Đường dẫn lưu trữ tệp video trên máy chủ
           $upload_path = "uploadvideoPoster/";
       
           // Di chuyển tệp video vào thư mục lưu trữ
           move_uploaded_file($video_tmp, $upload_path.$video_name);
       
           // Đường dẫn của tệp video trong thư mục lưu trữ
           $video_url = $upload_path.$video_name;   
    }
    
    $sqlUpdate = "UPDATE poster_movie 
    SET `name_poster`='$name',`nation`='$nation',`publish`='$publish',
    `time`='$time',`performer`='$performer',`moviedetails`='$moviedetails',
    `movie_genre`='$moviegenre',";
    
    if($uploadimg){
        $sqlUpdate.= "`poster_img`='$imgs',";
    }
    
    if($uploavideo){
        $sqlUpdate.= "`poster_vdurl`='$video_url',";
    }
    
    $sqlUpdate .= " `slogan`='$slogan' WHERE `poster_id` = $updateid ";
    
    mysqli_query($conn, $sqlUpdate);
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web movie</title>
    <link rel="icon" href="./img/icon/camera-2008489_640.webp">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="card_success.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
<div id="container">
  <div id="success-box">
    <div class="dot"></div>
    <div class="dot two"></div>
    <div class="face">
      <div class="eye"></div>
      <div class="eye right"></div>
      <div class="mouth happy"></div>
    </div>
    <div class="shadow scale"></div>
    <div class="message"><h1 class="alert">Success!</h1><p>bạn đã xửa thành công.</p></div>
    <button class="button-box"><a href="index-admin.php?movie=listposter" class="green">continue</a></button>
  </div>
  <!-- <div id="error-box">
    <div class="dot"></div>
    <div class="dot two"></div>
    <div class="face2">
      <div class="eye"></div>
      <div class="eye right"></div>
      <div class="mouth sad"></div>
    </div>
    <div class="shadow move"></div>
    <div class="message"><h1 class="alert">Error!</h1><p>oh no, something went wrong.</div>
    <button class="button-box"><h1 class="red">try again</h1></button>
  </div> -->
</div>


</body>
</html>