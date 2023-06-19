<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="CSS/login.css" rel="stylesheet" type="text/css">
    <title>Login</title>

</head>
<body>
<div class="triangle"></div>
<h1 class="logo">TECHIE.LK</h1>
<div class="baseContainer">

    <div class="form-container">
        <form name="login" method="post" action="login.php">
            <h1> Login to Your account</h1>
            <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" required/>
            <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" required/>
            <div class="submitContainer">
                <button name="btnLogin">Login</button>

                <label>
                    Remember me
                    <input type="checkbox" checked="checked" name="cnkRemember">
                </label>
            </div>
        </form>
        <p class="wrongPass">
            <?php
            if (isset($_POST["btnLogin"])) {
                $email = $_POST["txtEmail"];
                $password = $_POST["txtPassword"];

                $valid = false;


                $con = mysqli_connect("localhost", "root", "kjkszpj", "TechieLK");
                if (!$con) {
                    die("Cannot connect to DB Server!");
                }

                $sql = "SELECT * FROM `user` WHERE `email`='" . $email . "' and `password`='" . $password . "'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $valid = true;
                } else {
                    $valid = false;
                }

                if ($valid) {
                    $_SESSION["userName"] = $email;
                    header('location:home.php');
                } else {
                    echo "Invalid Username or Password";
                }
            }
            ?>
        </p>
        <a href="register.php">
            <p>Dont Have an Account? Create Now</p>
        </a>
    </div>
</div>
<div class="bgImage">
    <img src="Images/loginBG.png" alt="volarant" width="1000" height="300">
</div>


<div class="triangle">
    <svg xmlns="http://www.w3.org/2000/svg" width="739.576" height="1004.427" viewBox="0 0 739.576 1004.427">
        <path id="Path_2" data-name="Path 2" d="M3165.917,51.741h739.576V1056.168Z"
              transform="translate(-3165.917 -51.741)" fill="#e71419"/>
    </svg>
</div>



</body>
</html>
