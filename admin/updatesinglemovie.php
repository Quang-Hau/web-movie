<?php

require "../db/connect.php";

$updateid = $_POST['id'];

$sql_img = "SELECT * FROM single_movie WHERE id_singlemv = $updateid";

$result1 = mysqli_query($conn, $sql_img);

$row = mysqli_fetch_assoc($result1);

$name = $_POST['namesingle'];
$nation = $_POST['nation'];
$publish = $_POST['publish'];
$time = $_POST['time'];
$performer = $_POST['performer'];
$moviedetails = $_POST['moviedetails'];
$moviegenre = $_POST['moviegenre'];

//kiểm tra xem có ảnh mưới được chonn hay không

$uploadimg = !empty($_FILES['imgsingle']['name'][0]);
$uploavideo = !empty($_FILES['movieurl']['name']);

// xử lí nếu có ảnh mới được chọn

if ($uploadimg) {
  unlink($row['img_singlemv']);
}

if ($uploadimg) {
  $countfiles = count($_FILES['imgsingle']['name']);

  $imgs = '';

  for ($i = 0; $i < $countfiles; $i++) {
    $filename = $_FILES['imgsingle']['name'][$i];
    $filesize = $_FILES['imgsingle']['size'][$i];
    $generated_file_name = time() . '-' . $filename;


    $location = "uploadSingle/" . $filename . $generated_file_name;

    $extension = pathinfo($location, PATHINFO_EXTENSION);
    $extension = strtolower($extension);

    $valid_extensions = array("jpg", "jpeg", "png", "pdf", "docx");

    $response = 0;


    if (in_array(strtolower($extension), $valid_extensions)) {
      if (move_uploaded_file($_FILES['imgsingle']['tmp_name'][$i], $location)) {

        $imgs .= $location . ";";
      }
    }
  }

  $imgs = substr($imgs, 0, -1);
}

if ($uploavideo) {
  unlink($row['movie_url']);
  // Xử lý tệp video được tải lên
  $video_name = $_FILES['movieurl']['name'];
  $video_tmp = $_FILES['movieurl']['tmp_name'];
  $video_type = $_FILES['movieurl']['type'];


  // Đường dẫn lưu trữ tệp video trên máy chủ
  $upload_path = "uploadvideoSingle/";

  // Di chuyển tệp video vào thư mục lưu trữ
  move_uploaded_file($video_tmp, $upload_path . $video_name);

  // Đường dẫn của tệp video trong thư mục lưu trữ
  $video_url = $upload_path . $video_name;
}

$sqlUpdate = "UPDATE single_movie 
    SET `name_singlemv`='$name',`nation`='$nation',`publish`='$publish',
    `time`='$time',`performer`='$performer',`moviedetails`='$moviedetails',";

if ($uploadimg) {
  $sqlUpdate .= "`img_singlemv`='$imgs',";
}

if ($uploavideo) {
  $sqlUpdate .= "`movie_url`='$video_url',";
}

$sqlUpdate .= " `movie_genre`='$moviegenre' WHERE `id_singlemv` = $updateid ";

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
      <div class="message">
        <h1 class="alert">Success!</h1>
        <p>bạn đã xửa thành công.</p>
      </div>
      <button class="button-box"><a href="index-admin.php?movie=listsinglemovie" class="green">continue</a></button>
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