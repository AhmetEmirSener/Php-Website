<?php

include '../config.php';
include '../functions.php';



session_start();

if(isset($_SESSION['role'])){
    $usertype = $_SESSION['role'];
}



if(!isset($usertype)){
    session_destroy();
    header('location:admin.php');
}

if(isset($usertype)){
    $query = mysqli_query($conn, "SELECT * FROM contactpage") or die('query executed');

    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $insta = $row['insta'];
        $phone = $row['phone'];
        $mail = $row['mail'];
        $map = $row['map'];
    }
}

if(isset($_POST['update'])){
    $update_phone = $_POST['phone'];
    $update_mail = $_POST['mail'];
    $update_insta = $_POST['insta'];
    $update_map = $_POST['map'];
    $update_phone = mysqli_real_escape_string($conn, $update_phone);
    $update_mail = mysqli_real_escape_string($conn, $update_mail);
    $update_insta = mysqli_real_escape_string($conn, $update_insta);
    $update_map = mysqli_real_escape_string($conn, $update_map);
    $update_id = '1';

    mysqli_query($conn, "UPDATE `contactpage` SET phone = '$update_phone' , mail = '$update_mail' , insta = '$update_insta' , map = '$update_map' WHERE id = '$update_id'") or die('query failed');
    header('location:acontact.php');
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Editör</title>
    <link rel="stylesheet" href="../Css/adminContact.css">
</head>
<body >

<nav class="navbar">
        <ul>
            <li><a class="item" href="aindex.php">Anasayfa</a></li>
            <li><a class="item" href="aproducts.php">Ürünler</a></li>
            <li><a class="item" href="aabout.php">Hakkımızda</a></li>
            <li><a class="item" href="acontact.php">İletişim</a></li>
            <li><a class="item" href="admin.php?logout">Çıkış</a></li>
        </ul>
</nav>


    <div class="form-container">
    
        <form action="" method="post">
        <h3>iletişim</h3>
            <p>Lütfen içerik giriniz.</p><br>
            <input type="text"  name="insta" placeholder="Instagram" value="<?php echo $insta ?>"><br>
            <input type="text"  name="phone" placeholder="Telefon Numarası" value="<?php echo $phone ?>"><br>
            <input type="text"  name="mail" placeholder="Mail" value="<?php echo $mail ?>"><br>
            <input type="text"  name="map" placeholder="Harita" value="<?php echo $map ?>"><br>
            <input type="submit" name="update" class="option-btn" value="Güncelle">
        </form>
    </div>

</body>
</html>