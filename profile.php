<?php

include 'config.php';

session_start();

$userid = $_SESSION['id'];

if(!isset($userid)){
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Profili</title>
    <link rel="stylesheet" href="Css/profile.css">
</head>
<body>
    <div class="container">

    <div class="user-profile">

        <?php

               $userDetail = mysqli_query($conn, "SELECT * FROM users WHERE id = '$userid' ") or die('Executed!');
               if(mysqli_num_rows($userDetail) > 0 ){
                    $fetch_user = mysqli_fetch_assoc($userDetail);
               }
        ?>
        <h2>Kullanıcı Profili</h3>
        <p>Ad : <span> <?php    echo $fetch_user['name'];   ?></span> </p>
        <p>Soyad : <span> <?php    echo $fetch_user['surname'];   ?></span> </p>
        <p>Telefon No : <span> <?php    echo $fetch_user['phonenumber'];   ?></span> </p>
        <p>Mail : <span> <?php    echo $fetch_user['mail'];   ?></span> </p>
        <a href="index.php" class="btn">Anasayfa</a>
        <a href="index.php?logout=<?php echo $userid; ?>" class="option-btn">Çıkış Yap</a>

    </div>

    </div>
    
</body>
</html>