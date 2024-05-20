<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="icon" href="./img/icon/camera-2008489_640.webp">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="card_success.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        #error-box {
            width: 18%;
            height: 39%;
            left: 50%;
            top: 29%;
            }
    </style>
</head>
<body> 
    <div class="container">
        <div class="container-content">
            <h3>WELCOME BACK!</h3>
            <h1>Log In</h1>
            
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="POST">
                
                <div class="form-group">
                    <input type="text" name="username" id="username" placeholder="Enter your user name" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" name="btn" class="btn"> LOG IN </button>
            </form>
        </div>
    </div>
    <script>                    //"DOMContentLoaded" sẽ được kích hoạt. Điều này cho phép mã JavaScript được thực thi ngay lập tức mà không cần đợi cho toàn bộ tài liệu và các tài nguyên khác tải xong.
    document.addEventListener("DOMContentLoaded", function() {
        const btn = document.querySelector('.button-box'); 
        const error = document.getElementById('error-box');
        btn.addEventListener('click', function(e) {
            error.style.display = 'none';
        });
    });
</script>

</body>
</html>

<?php


require "../db/connect.php";

if (isset($_POST['btn'])){
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM loginadmin WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) === 0){
        echo ' <div id="error-box">
        <div class="dot"></div>
        <div class="dot two"></div>
        <div class="face2">
          <div class="eye"></div>
          <div class="eye right"></div>
          <div class="mouth sad"></div>
        </div>
        <div class="shadow move"></div>
        <div class="message"><h1 class="alert">Error!</h1><p>Tài khoản hoặc mật khẩu sai!</div>
        <button class="button-box"><h1 class="red">try again</h1></button>
      </div> ';
    }else{
        $_SESSION['username'] = $username;
        header("Location:index-admin.php");
    }
}

?>


?>