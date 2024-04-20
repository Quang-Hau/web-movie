<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web movie</title>
    <link rel="icon" href="./img/icon/camera-2008489_640.webp">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./owl/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./owl/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="responsive.css">
</head>
<body>
<?php 

    include "./inc/header.php";

        if(isset($_GET['movie'])){
            switch($_GET['movie']) {
                case 'new-movie':
                    include "./inc/poster.php";
                    include "./inc/new-movie.php";
                    break;
    
                case 'single-movie':
                    include "./inc/poster.php";
                    include "./inc/single-movie.php";
                    include "./inc/phim-chieu-rap.php";
                    break;
    
                case 'series-movie':
                    include "./inc/poster.php";
                    include "./inc/series-movie.php";
                    break;
    
                default: 
                include "./inc/poster.php";
                include "./inc/phim-chieu-rap.php";
                include "./inc/single-movie.php";
                include "./inc/new-movie.php";
                include "./inc/series-movie.php";
            }
        }

        include "./inc/footer.php";
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./owl/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
        $(".owl-carousel").owlCarousel();
        });
                $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            autoplayTimeout:5000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
</body>
</html>