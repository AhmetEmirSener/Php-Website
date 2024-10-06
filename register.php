<?php

include 'config.php';
include 'functions.php';

$page = $_SERVER['HTTP_REFERER'];

if(isset($_POST['submit'])){

    $name =     mysqli_real_escape_string($conn, ($_POST['name']));
    $surname =  mysqli_real_escape_string($conn, ($_POST['surname']));
    $email =    mysqli_real_escape_string($conn, ($_POST['email']));
    $phonenum = mysqli_real_escape_string($conn, ($_POST['phonenumber']));
    $pass =     mysqli_real_escape_string($conn, md5($_POST['password']));

    $query = mysqli_query($conn, "SELECT * FROM users WHERE mail = '$email' AND password = '$pass'") or die('query executed');

    if(mysqli_num_rows($query) > 0){
        $message[] = 'Kullanıcı zaten kayıtlı.';
    }else{
        mysqli_query($conn, "INSERT INTO users(name,surname,phonenumber,mail,password) VALUES ('$name','$surname','$phonenum','$email','$pass')") or die('Executed!');
        $message[] = 'Kayıt başarılı!';
        header('location:login.php');
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt</title>
    <link rel="stylesheet" href="Css/registerStyle.css">
</head>
<body>

<?php


if(isset($message)){
    foreach($message as $message){
        echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
    }
}


?>

    
    <div class="form-container">

        <form action="" method="post">
            <h3>Kayıt Ol</h3>
            <input type="text" name="name" required placeholder="Lütfen isim giriniz" class="box">
            <input type="text" name="surname" required placeholder="Lütfen soy isim giriniz" class="box">
            <input type="email" name="email" required placeholder="Lütfen email giriniz" class="box">
            <input type="number" name="phonenumber" required placeholder="Lütfen telefon no giriniz" class="box">
            <input type="password" name="password" required placeholder="Lütfen parola giriniz" class="box">
            <input type="password" name="confirmpassword" required placeholder="Lütfen parolanızı tekrar giriniz" class="box">
            <input type="submit" name="submit" class="btn" value="Kayıt Ol">
            <p>Zaten Üye misin? <a href="login.php">Giriş Yap</a></p>
            <a href="index.php">  Anasayfa</a>
    </div>

</body>
</html>