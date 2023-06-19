<?php session_start();
if (!isset($_SESSION["userName"])) {
    header('Location:login.php');
}


$con = mysqli_connect("localhost", "root", "kjkszpj", "techielk");
if (!$con) {
    die ("Cant connect to Database Server");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="CSS/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/homePage.css">
    <link rel="stylesheet" type="text/css" href="CSS/Card.css">
    <link rel="stylesheet" type="text/css" href="CSS/footer.css">
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>

<div class="bodyCon">
    <div class="GI grid-item-InnerHeader">
        <div class="GI grid-item-logo">
            <a href="home.php"><h1 class="TechieLogo">TechieLK</h1></a>
        </div>
        <div class="GI grid-item-Menu">
            <a href="#">Best Selling</a>
            <a href="#">Top Deals</a>
            <a href="#">Categories</a>
            <a href="#">Contact US</a>
            <?php
            $sql = "select admin from user where email = '".$_SESSION["userName"]."';" ;
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_row($result);

            if ($row[0] == 1){
                echo "<a href='addItem.php'>Add Item</a>";
            }

            ?>

            <a href="logout.php">Logout</a>

        </div>
    </div>

    <div class="Grid ">
        <div class="Content">

            <p class="Topic Topic1">Best Gaming PCs</p>



            <?php
            $sql = "select brand, pname, Description, imgPath from products where category = 'desktop' order by pid desc limit 1;";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_row($result);

            echo "
            <p class='Topic Topic2'>".$row[0] ." ".$row[1]."<br> For Gamers</p>
            <P class='Topic Details'>".$row[2] ." </P>
            <a class='btnBuyNow' href=''#'><span></span>Buy Now</a>
        </div>
        <div class='bgImage'>
            <img class='Slideshow' src='$row[3]   q' alt='PCIMg' width='1000' height='300'>
            ";
            ?>
        </div>

    </div>
</div>

<div class="DivCat DivCat-BestDeals">
    <h2 class="h2Topic">Today's Best Deals</h2>
    <div class="ItemContainer ItemContainer-Purple">

        <?php

        $sql = "select pid, brand , pname, Detail, price, imgPath from products order by pid desc limit 4;";
        $result = mysqli_query($con, $sql);

        displayProduct($result);
        ?>

    </div>
</div>

<div class="DivCat DivCat-Monitors">
    <h2 class="h2Topic">Monitors</h2>
    <div class="ItemContainer ItemContainer-Red">

        <?php

        $sql = "select pid, brand , pname, Detail, price, imgPath from products where category = 'monitor' order by pid desc limit 4;";
        $result = mysqli_query($con, $sql);

        displayProduct($result);
        ?>

    </div>
</div>

<div class="DivCat DivCat-Mouse">
    <h2 class="h2Topic">Mouse</h2>
    <div class="ItemContainer ItemContainer-Green">

        <?php

        $sql = "select pid, brand , pname, Detail, price, imgPath from products where category = 'mouse' order by pid desc limit 4;";
        $result = mysqli_query($con, $sql);

        displayProduct($result);
        ?>

    </div>
</div>


<div class="DivCat DivCat-Vga">
    <h2 class="h2Topic">Graphic Cards</h2>
    <div class="ItemContainer ItemContainer-Red">

        <?php

        $sql = "select pid, brand , pname, Detail, price, imgPath from products where category = 'vga' order by pid desc limit 4;";
        $result = mysqli_query($con, $sql);

        displayProduct($result);
        ?>

    </div>
</div>

<div class="footerContainer">
    <div class="footerImagesContainer">
        <a href="https://facebook.com">
            <img src="Images/footer/fb.svg" alt="PCIMg" width="50" height="50">
        </a>
        <a href="https://instagram.com">
            <img src="Images/footer/ig.svg" alt="PCIMg" width="50" height="50">
        </a>
        <a href="https://twitter.com">
            <img src="Images/footer/twi.svg" alt="PCIMg" width="50" height="50">
        </a>
    </div>
    <div class="footerTextContainer footerTextContainer1">
        <a href="Footer/Info.html">
            Info
        </a>
        <a href="Footer/Support.html">
            Support
        </a>
        <a href="Footer/Info.html">
            Marketing
        </a>

    </div>
    <div class="footerTextContainer footerTextContainer1">
        <a href="Footer/TermsOfUse.html">
            Terms Of User
        </a>
        <a href="Footer/PrivacyPolicy.html">
            Privacy Policy
        </a>
    </div>

</div>
</body>
</html>

<?php

function displayProduct($result)
{


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

            echo "
        <div class='card'>
            <div class='card-info'>
                <img class='Img1' src='" . $row["imgPath"] . "' alt='PCIMg' width='888' height='666'>
                <p class='title'>
                    " . $row["brand"] . " " . $row["pname"] . " -
                    " . $row["Detail"] . "</p>
                <p class='price'>Rs." . $row["price"] . "</p>
                <p class='fd'>Free Delivery</p>
                <a href='ProductDes.php?id=" . $row["pid"] . "'>
                <button class='Buy'>Buy Now</button>
                </a>
            </div>
        </div>
        ";
        }
    }
}

?>
