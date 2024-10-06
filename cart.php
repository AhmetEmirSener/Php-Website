<?php

include 'config.php';

session_start();

$userid = $_SESSION['id'];

if(!isset($userid)){
    header("location:login.php");
}

if(isset($_POST['update_cart'])){
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'sepet başarıyla güncellendi!';
 }
 
 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:cart.php');
 }
   
 if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart` WHERE userid = '$userid'") or die('query failed');
    header('location:cart.php');
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepet</title>
    <link rel="stylesheet" href="Css/cart.css">
</head>
<body>
    <div class="container">
<div class="shopping-cart">

<h1 class="heading">sepet</h1>

<table>
   <thead>
      <th>resmi</th>
      <th>ismi</th>
      <th>fiyat</th>
      <th>adet</th>
      <th>toplam tutar</th>
      <th></th>
   </thead>
   
    <?php
        $cart_query = mysqli_query($conn, "SELECT * FROM cart WHERE userid = '$userid'") or die('query failed');
        $grand_total = 0;
        if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
    ?>
        <tr>
            <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" width="120" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>TL <?php echo $fetch_cart['price']; ?> -</td>
            <td>
                <form action="" method="post">
                <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                <input type="submit" name="update_cart" value="güncelle" class="option-btn">
                </form>
            </td>
            <td> TL <?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?> </td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('Bu ürünü sepetinizden kaldırmak istediğinize emin misiniz?');">sil</a></td>
        </tr>
    <?php
        $grand_total += $sub_total;
            }
        }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">boş</td></tr>';
        }
    ?>
    <tr class="table-bottom">
        <td colspan="4">Toplam  :</td>
        <td>TL <?php echo $grand_total; ?></td>
        <td><a href="cart.php?delete_all" onclick="return confirm('Sepeti temizlemek istediğinize emin misiniz?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">temizle</a></td>
    </tr>
</div>
</table>

<div class="cart-btn">  
   <a href="#" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">satın al</a>
   <a href="index.php" class="btn ">anasayfa</a>
</div>

</div>


</div>
</body>
</html>