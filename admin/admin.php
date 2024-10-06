<?php

include '../config.php';
include '../functions.php';




session_start();

if(isset($_GET['logout'])){
    unset($usertype);
    session_destroy();
    header('location:../index.php');
}

if(isset($_SESSION['role'])){
    $usertype = $_SESSION['role'];
}


if(isset($usertype)){
    header('location:aindex.php');
}


if(isset($_POST['submit'])){


    $email =    mysqli_real_escape_string($conn, ($_POST['email']));
    $pass =     mysqli_real_escape_string($conn, md5($_POST['password']));

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE name = '$email' AND password = '$pass' AND role = 1") or die('query executed');

    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $_SESSION['role'] = $row['role'];
        header('location:aindex.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Girişi</title>
    <link rel="stylesheet" href="../Css/registerStyle.css">
</head>
<body >


    <div class="form-container">

        <form action="" method="post">
            <h3>Yonetici Girisi</h3>
            <input type="text" name="email" required  class="box">
            <input type="password" name="password" required  class="box">
            <input type="submit" name="submit" class="btn" value="Giriş Yap">
    </div>

</body>
</html>