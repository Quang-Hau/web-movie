<?php
// ini_set('display_errors', 'Off');

require "../db/connect.php";
$id = $_GET['id'];

$sql_img = "SELECT img_singlemv,movie_url FROM single_movie WHERE id_singlemv = $id";

$result = mysqli_query($conn,$sql_img);

$row = mysqli_fetch_assoc($result);

unlink($row['img_singlemv']);
unlink($row['movie_url']);


$sql = "DELETE FROM single_movie WHERE id_singlemv = $id";

mysqli_query($conn, $sql);

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
    <div class="message"><h1 class="alert">Success!</h1><p>bạn đã xóa thành công.</p></div>
    <button class="button-box"><a href="index-admin.php?movie=listsinglemovie" class="green">continue</a></button>
  </div>
</div>


</body>
</html>