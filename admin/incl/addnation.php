
    <?php

        $messerr = '';

        $messSuccess = '';

    if(isset($_POST['btn'])){
        require "../db/connect.php";
        $namenation = $_POST['namenation'];
        $nationid = $_POST['nationid'];

        $checknation = "SELECT * FROM movie_nation WHERE name_nation = '$namenation' OR nation_id = '$nationid'";

        $result = mysqli_query($conn, $checknation);

        if( mysqli_num_rows($result) === 0 ){
            $sql = "INSERT INTO `movie_nation`(`name_nation`,`nation_id`) VALUES ('$namenation','$nationid')";
             mysqli_query($conn, $sql);

             $messSuccess = 'ĐÃ THÊM QUỐC GIA';

        } else{
            $messerr = 'DỮ LIỆU ĐÃ TỒN TẠI';
        }


    }
    
    ?>


<div class="container">
        <div class="content">
        <h1 class="heading">THÊM QUỐC GIA</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form_group">
                <input type="text" name="namenation" id="namenation" required>
                <label for="namenation">Tên Quốc Gia</label>
            </div>
            <div class="form_group">
                <input type="number" name="nationid" id="nationid" required>
                <label for="nationid">ID Quốc Gia</label>
            </div>
            <button class="btn " type="submit" name="btn">submit</button>
        </form>

        <h4 class="heading mess--err"> <?php echo $messerr?></h4> 
        <h4 class="heading mess--success"> <?php echo $messSuccess?></h4> 
        </div>
    </div>