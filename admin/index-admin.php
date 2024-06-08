<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web movie</title>
    <link rel="icon" href="./img/icon/camera-2008489_640.webp">
    <link rel="stylesheet" href="admin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body class="dark">
    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location:loginad.php");
    }

    include "./incl/header.php";
    if (isset($_GET['movie'])) {
        switch ($_GET['movie']) {
            case 'addposter':
                include "./incl/addposter.php";
                break;

            case 'addnation':
                include "./incl/addnation.php";
                break;

            case 'addnewmv':
                include "./incl/addnewmv.php";
                break;

            case 'addseriesmv':
                include "./incl/addseriesmv.php";
                break;

            case 'addsinglemv':
                include "./incl/addsinglemv.php";
                break;
            case 'listposter':
                include "./incl/listposter.php";
                break;
            case 'listnewmovie':
                include "./incl/listnewmovie.php";
                break;
            case 'listsinglemovie':
                include "./incl/listsinglemovie.php";
                break;
            case 'listnation':
                include "./incl/listnation.php";
                break;
            default:
        }
    }
    ?>
</body>
<script src="app.js"></script>

</html>