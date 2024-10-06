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

$query = mysqli_query($conn, "SELECT * FROM contactpage WHERE id = '1'") or die('query executed');

if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_assoc($query);
    $insta = $row['insta'];
    $phone = $row['phone'];
    $mail = $row['mail'];
    $map = $row['map'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim</title>
    <link rel="stylesheet" href="Css/contact.css">
</head>
<body>
<br><br><br><br><br>

<section class="iletisim">
    <div class="row">
    <iframe class="map" src="<?php echo $map; ?>"></iframe>
        <div class="iletisim_bilgileri">
            <h3 class="h3">Iletişim Bilgilerimiz</h3>
            <div class="iletisim">
                <i class="fa-brands fa-instagram"></i><a href="https://www.instagram.com/<?php echo $insta; ?>/"><?php echo $insta; ?></a> 
            </div>
            <div class="iletisim">
                <i class="fa-solid fa-phone"></i><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a> 
            </div>
            <div class="iletisim">
                <i class="fa-regular fa-envelope"></i><a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a> 
            </div>

        </div>
    </div>

</section>

<?php
include 'footer.php';
?>
</body>
</html>

