<?php

include 'config.php';
include 'navbar.php';



if(isset($_SESSION['id'])){
    $userid = $_SESSION['id'];
}


/*
if(!isset($userid)){
    header('location:login.php');
}
*/
if(isset($_GET['logout'])){
    unset($userid);
    session_destroy();
    header('location:login.php');
}

$query = mysqli_query($conn, "SELECT * FROM indexpage WHERE id = '1'") or die('query executed');

if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_assoc($query);
    $text = $row['text'];
    $img = $row['img'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
    <link rel="stylesheet" href="Css/index.css">
</head>
<body>
<div class="about-us"> 
        <div class="container"> 
            <div class="row">
                <div class="flex">
                    <h3>Anasayfa</h3>
                    <p><?php echo $text ; ?></p>
                        
                    <div>
                    <a href="products.php"><button class="btn">Ürünlere göz at</button></a>
                    </div>
                    
                </div>
            <div class="flex">
                <img src="images/pages/<?php echo $img ; ?> "alt="">
            </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
</html>

