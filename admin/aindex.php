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
    $query = mysqli_query($conn, "SELECT * FROM indexpage") or die('query executed');

    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $text['text'] = $row['text'];
    }
}

if(isset($_POST['update'])){
    $update_text = $_POST['textarea'];
    $update_text = mysqli_real_escape_string($conn, $update_text);
    $update_id = '1';
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = '../images/pages/'.$file_name;
    move_uploaded_file($tempname, $folder);
    mysqli_query($conn, "UPDATE `indexpage` SET text = '$update_text' , img = '$file_name' WHERE id = '$update_id'") or die('query failed');
    header('location:aindex.php');
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa Editör</title>
    <link rel="stylesheet" href="../Css/admin.css">
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
    
        <form action="" method="post" enctype="multipart/form-data">
        <h3>Anasayfa</h3>
            <p>Lütfen içerik giriniz.</p>
            <textarea name="textarea" id="txt" rows="25" cols="100 "><?php echo $text['text'] ?></textarea>    
            <input type="submit" name="update" class="option-btn" value="Güncelle">
            <input type="file"    name="image" >

        </form>
    </div>

</body>
</html>