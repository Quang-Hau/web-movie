

<?php

    require "../db/connect.php";
       
    $updateid = $_POST['id'];

    $namenation = $_POST['namenation'];
    $nationid = $_POST['nationid'];
    
    $checknation = "SELECT * FROM movie_nation WHERE name_nation = '$namenation' OR nation_id = '$updateid'";
    
    $result = mysqli_query($conn, $checknation);
    
    if( mysqli_num_rows($result) === 0 ){
        $sql = "UPDATE movie_nation SET`name_nation`='$namenation',`nation_id`='$nationid' WHERE  id_nation = $updateid";

         mysqli_query($conn, $sql);
    
         $messSuccess = 'ĐÃ THÊM QUỐC GIA';
    
    } else{
        $messerr = 'DỮ LIỆU ĐÃ TỒN TẠI';
    }
    
    
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
    <button class="button-box"><a href="index-admin.php?movie=listnation" class="green">continue</a></button>
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