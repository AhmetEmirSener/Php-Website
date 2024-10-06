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

if(isset($_POST['addtocart'])){
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productImage = $_POST['productImage'];
    $productQuantity = $_POST['productQuantity'];

    if(!isset($userid)){
        header('location:login.php');
    }

    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$productName' AND id = '$userid'") or die('query failed');

    if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'Bu ürün zaten sepetinizde bulunuyor!';
     }else{
        mysqli_query($conn, "INSERT INTO cart(userid, name, price, image, quantity) VALUES('$userid', '$productName', '$productPrice', '$productImage', '$productQuantity')") or die('query failed');
        $message[] = 'Ürün sepete eklendi.';
     }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünler</title>
    <link rel="stylesheet" href="Css/products.css">
</head>
<body>

    <div class="container">
    <h3>Ürünler</h3>
    <hr/>
        <div class="products">

        <div  class="box-container">
        
        <?php
            
            $query = mysqli_query($conn, "SELECT image, name, description, price FROM `products`")
            or die('Executed!');
            
            if(mysqli_num_rows($query) > 0){
                while ($fetch=mysqli_fetch_assoc($query)){
        ?>
        
            <form method="post" class="box" action="">
                <img src="images/<?php echo $fetch['image']; ?>" alt=""><hr/>                
                <div class="name"><?php echo $fetch['name']; ?></div>
                <div class="description"><?php echo $fetch['description']; ?></div>
                <div class="price"><?php echo $fetch['price'] . " TL"; ?></div>
                <input type="number" min="1" name="productQuantity" value="1">
                <input type="hidden" name="productImage" value="<?php echo $fetch['image']; ?>">
                <input type="hidden" name="productName" value="<?php echo $fetch['name']; ?>">
                <input type="hidden" name="productPrice" value="<?php echo $fetch['price']; ?>">
                <input type="submit" name="addtocart" value="Sepete Ekle" class="btn">
            </form>
        <?php
             }

        }
    ?>
        

        </div>

        </div>        
        
    </div>
    
    <?php
    include 'footer.php';
    ?>
</body>
</html>

