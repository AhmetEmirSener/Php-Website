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

if(isset($_POST['update'])){
    $update_quantity = $_POST['count'];
    $update_name = $_POST['name'];
    $update_price = $_POST['price'];
    $update_detail = $_POST['detail'];
    $update_id = $_POST['id'];
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = '../images/'.$file_name;
    move_uploaded_file($tempname, $folder);
    mysqli_query($conn, "UPDATE `products` SET count = '$update_quantity' , name = '$update_name' , price = '$update_price' , description = '$update_detail' , image = '$file_name' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'sepet başarıyla güncellendi!';
 }

 if(isset($_POST['add'])){
    $add_quantity = $_POST['count'];
    $add_name = $_POST['name'];
    $add_price = $_POST['price'];
    $add_detail = $_POST['detail'];
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = '../images/'.$file_name;
    move_uploaded_file($tempname, $folder);
    mysqli_query($conn, "INSERT INTO `products` (name,price,description,count,image) values ('$add_name','$add_price','$add_detail','$add_quantity','$file_name') ") or die('query failed');
    $message[] = 'sepet başarıyla güncellendi!';
 }
 
 if(isset($_GET['remove'])){
    $id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$id'") or die('query failed');
    header('location:aproducts.php');
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünler Editör</title>
    <link rel="stylesheet" href="../Css/adminProducts.css">
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
<div class="container">
<div class="shopping-cart">

<h1 class="heading">ürün güncelle</h1>

<table>
   <thead>
      <th>resmi</th>
      <th>ismi</th>
      <th>açıklaması</th>
      <th>fiyat</th>
      <th>adet</th>
      <th colspan="3">islem</th>
      
   </thead>
   
    <?php
        $query = mysqli_query($conn, "SELECT * FROM products") or die('query failed');
        if(mysqli_num_rows($query) > 0){
            while($fetch = mysqli_fetch_assoc($query)){
    ?>
        <tr>
            <td><img src="../images/<?php echo $fetch['image']; ?>" height="100" width="120" alt=""></td>

                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $fetch['id']; ?>">
                <td><input type="text"  name="name" value="<?php echo $fetch['name']; ?>"></td>
                <td><input type="text"  name="detail" value="<?php echo $fetch['description']; ?>"></td>
                <td><input type="number"  name="price" value="<?php echo $fetch['price']; ?>"></td>
                <td><input type="number"  name="count" value="<?php echo $fetch['count']; ?>"></td>
                <td><input type="file"    name="image" ></td>
                <td><input type="submit" name="update" value="güncelle" class="option-btn">
                
                </form>
                
            <td><a href="aproducts.php?remove=<?php echo $fetch['id']; ?>" class="delete-btn" onclick="return confirm('Bu ürünü veritabanından kaldırmak istediğinize emin misiniz?');">sil</a></td>
        </tr>
    <?php  
            }
        }
    ?>
    
</div>
</table>
<br><br>
<h1 class="heading">ürün ekle</h1>
<table>
   <thead>
      <th>ismi</th>
      <th>açıklaması</th>
      <th>fiyat</th>
      <th>adet</th>
      <th colspan="3">islem</th>
      
   </thead>
   

        <tr>
            

                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="">
                <td><input type="text"  name="name" value=""></td>
                <td><input type="text"  name="detail" value=""></td>
                <td><input type="number"  name="price" value=""></td>
                <td><input type="number"  name="count" value=""></td>
                <td><input type="file"    name="image" ></td>
                <td><input type="submit" name="add" value="ekle" class="option-btn">
                
                </form>
        </tr>
</div>
</table>




</div>


</div>
</body>
</html>