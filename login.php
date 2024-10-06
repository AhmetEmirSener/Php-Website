<?php

include 'config.php';
include 'functions.php';




session_start();

if(isset($_SESSION['id'])){
    $userid = $_SESSION['id'];
}


if(isset($userid)){
    header('location:index.php');
}


if(isset($_POST['submit'])){


    $email =    mysqli_real_escape_string($conn, ($_POST['email']));
    $pass =     mysqli_real_escape_string($conn, md5($_POST['password']));

    $query = mysqli_query($conn, "SELECT * FROM users WHERE mail = '$email' AND password = '$pass'") or die('query executed');

    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $_SESSION['id'] = $row['id'];
        header('location:index.php');
    }else{
        $message[] = 'Hatalı mail veya parola';
        ShowMessage($message);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Girişi</title>
    <link rel="stylesheet" href="Css/registerStyle.css">
</head>
<body >


    <div class="form-container">

        <form action="" method="post">
            <h3>Uye Girişi</h3>
            <input type="email" name="email" required placeholder="Lütfen email giriniz" class="box">
            <input type="password" name="password" required placeholder="Lütfen parola giriniz" class="box">
            <input type="submit" name="submit" class="btn" value="Giriş Yap">
            <p>Üye değilmisin? <a href="register.php">Hemen Üye Ol!</a>  </p>
            <a href="index.php">  Anasayfa</a>
    </div>

</body>
</html>