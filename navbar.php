<?php

include 'config.php';
session_start();

if(isset($_SESSION['id'])){
    $userid = $_SESSION['id'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/navbar.css">
</head>
<body>
<nav class="navbar">
        <ul>
            <li><a class="item" href="index.php">Anasayfa</a></li>
            <li><a class="item" href="products.php">Ürünler</a></li>
            <li><a class="item" href="about.php">Hakkımızda</a></li>
            <li><a class="item" href="contact.php">İletişim</a></li>
            <?php 
                if(!isset($userid)){?>
                   <li><a class="item" href= "login.php" >Giriş Yap</a></li>
                <?php }else{ ?>
                    <li><a class="item" href="profile.php" >Hesabım</a></li>
                <?php }  ?>
            <li class="cart"><a href="cart.php"><img class="cart-image" src="images/icons/cart.png" alt="cart"></a></li>        
        </ul>
    </nav>
</body>
</html>