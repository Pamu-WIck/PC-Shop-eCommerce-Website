<?php session_start();
if (!isset($_SESSION["userName"])) {
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="CSS/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/ItemDetails.css">
    <link rel="stylesheet" type="text/css" href="CSS/footer.css">

    <meta charset="UTF-8">
    <title>Detail Card</title>
</head>
<body>

<div class="GI grid-item-InnerHeader">
    <div class="GI grid-item-logo">
        <a href="home.php"><h1 class="TechieLogo">TechieLK</h1></a>
    </div>
    <div class="GI grid-item-Menu">
        <a href="#">Best Selling</a>
        <a href="#">Top Deals</a>
        <a href="#">Categories</a>
        <a href="#">Contact US</a>
    </div>
</div>

<div class="detailCard">
    <div class="innerDetailCard">
        <div class="MainPic">
            <?php
            $con = mysqli_connect("localhost", "root", "kjkszpj", "techielk");
            if (!$con) {
                die ("Cant connect to Database Server");
            }
            $sql = "select * from products where pid = ".$_GET["id"].";";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_row($result);
            echo "
            <img class='ProductImage' src='".$row[7]."' alt='PCIMg' width='400' height='1000'>
        </div>
        <div class='details'>
            <h1>".$row['2']." ".$row[1]."</h1>
            <h2>".$row[4]."</h2>
            <p>".$row[5]." </p>
            <p class='price'>
                Rs.".$row[6]."
            </p>
            "

            ?>
            <button class="Buy">Buy Now</button>
        </div>
    </div>
</div>
<div class="footerContainer">
    <div class="footerImagesContainer">
        <a href="https://facebook.com">
            <img src="Images/footer/fb.svg" alt="PCIMg" width="50" height="50">
        </a>
        <a href="https://ig.com">
            <img src="Images/footer/ig.svg" alt="PCIMg" width="50" height="50">
        </a>
        <a href="https://twitter.com">
            <img src="Images/footer/twi.svg" alt="PCIMg" width="50" height="50">
        </a>
    </div>
    <div class="footerTextContainer footerTextContainer1">
        <p class="txtFooter p1">Info</p>
        <p class="txtFooter p2">Support</p>
        <p class="txtFooter p3">Marketing</p>

    </div>
    <div class="footerTextContainer footerTextContainer1">
        <p class="txtFooter p4">Terms Of Use</p>
        <p class="txtFooter p5">Privacy Policy</p>
    </div>

</div>
</body>
</html>